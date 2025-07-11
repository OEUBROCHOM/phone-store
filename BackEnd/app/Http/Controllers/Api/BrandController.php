<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageUrl = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/brands', $filename);
            $imageUrl = url('storage/brands/' . $filename);
        }

        $brand = Brand::create([
            'name' => $request->name,
            'image_url' => $imageUrl,
        ]);

        return response()->json([
            'message' => 'Brand created successfully',
            'brand' => $brand,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
            if (!$brand) {
                return response()->json(['message' => 'Brand not found'], 404);
            }

        return $brand;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
            if (!$brand) {
                return response()->json(['message' => 'Brand not found'], 404);
            }

            $request->validate([
                'name' => 'required|unique:brands,name,' . $id,
                'image_url' => 'nullable|url',
            ]);

            $brand->update($request->all());

            return response()->json([
                'message' => 'Brand updated successfully',
                'brand' => $brand
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
            if (!$brand) {
                return response()->json(['message' => 'Brand not found'], 404);
            }

        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully']);
    }
}
