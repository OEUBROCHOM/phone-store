<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// User auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);

// Shared
Route::get('/products', [ProductController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brands', [BrandController::class, 'store']);
Route::post('/products', [ProductController::class, 'store']);

// Route::get('/orders', [OrderController::class, 'index']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);



    // Admin only
    Route::middleware('admin')->group(function () {
    });


    // Cart
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);

    // Order
    Route::post('/orders', [OrderController::class, 'store']);

});

// Fall back
Route::fallback(function () {
    return response()->json(['message' => 'API Route not found.'], 404);
});

