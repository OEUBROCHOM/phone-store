<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $avatarPath = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/avatars', $filename);
            $avatarPath = 'storage/avatars/' . $filename;
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
            'role'     => 'user',
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $avatarPath ? url($avatarPath) : null,
            ],
            'token'   => $token,
        ], 201);
    }

    //Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ]);
    }

    // Profile
    public function profile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'phone' => $user->phone,
            'avatar' => $user->avatar,
            'created_at' => $user->created_at,
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    // Update profile
  public function updateProfile(Request $request, $id)
{
    $authenticatedUser = $request->user();
    $userToUpdate = User::findOrFail($id);

    // Regular users can only update their own profile
    if ($authenticatedUser->role !== 'admin' && $authenticatedUser->id != $id) {
        return response()->json([
            'message' => 'Unauthorized - You can only update your own profile'
        ], 403);
    }

    $validator = Validator::make($request->all(), [
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $userToUpdate->id,
        'password' => 'sometimes|string|min:6',
        'avatar' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        'phone' => 'sometimes|string|max:20',
        'role' => 'sometimes|string|in:user,admin' // Only allow admin to update role
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $data = $validator->validated();

    // Remove role from data if user is not admin
    if ($authenticatedUser->role !== 'admin' && isset($data['role'])) {
        unset($data['role']);
    }

    // Handle avatar upload
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/avatars', $filename);
        $data['avatar'] = 'storage/avatars/' . $filename;

        // Delete old avatar if exists
        if ($userToUpdate->avatar && file_exists(public_path($userToUpdate->avatar))) {
            unlink(public_path($userToUpdate->avatar));
        }
    }

    // Hash password if provided
    if (isset($data['password'])) {
        $data['password'] = Hash::make($data['password']);
    }

    $userToUpdate->update($data);

    return response()->json([
        'message' => 'Profile updated successfully.',
        'user' => [
            'id' => $userToUpdate->id,
            'name' => $userToUpdate->name,
            'email' => $userToUpdate->email,
            'phone' => $userToUpdate->phone,
            'avatar' => $userToUpdate->avatar ? url($userToUpdate->avatar) : null,
            'role' => $userToUpdate->role,
            'created_at' => $userToUpdate->created_at,
        ]
    ]);
}
}
