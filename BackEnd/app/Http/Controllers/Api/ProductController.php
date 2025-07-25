<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand')->latest()->get();
        return $products;


         return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'price' => 'required|numeric',
            'ram' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $imagePath = 'storage/products/' . $filename; // this is relative path
        }

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,
            'ram' => $request->ram,
            'image_url' => $imagePath, // store path only
        ]);

        return response()->json([
            'message' => 'Product created successfully.',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'brand_id' => $product->brand_id,
                'content' => $product->content,
                'price' => $product->price,
                'ram' => $product->ram,
                'image_url' => $imagePath ? url($imagePath) : null, // 👈 FULL URL here
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('brand')->find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the product
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'price' => 'required|numeric',
            'ram' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Prepare data for update
        $data = $request->only(['brand_id', 'name', 'content', 'price', 'ram']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image_url) {
                Storage::delete(str_replace('storage/', 'public/', $product->image_url));
            }

            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $data['image_url'] = 'storage/products/' . $filename;
        }

        // Update the product using mass assignment
        $product->update($data);

        // Return the updated product
        return response()->json([
            'message' => 'Product updated successfully.',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'brand_id' => $product->brand_id,
                'content' => $product->content,
                'price' => $product->price,
                'ram' => $product->ram,
                'image_url' => $product->image_url ? url($product->image_url) : null,
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }
        if ($product->image_url) {
            Storage::delete(str_replace('storage/', 'public/', $product->image_url));
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
