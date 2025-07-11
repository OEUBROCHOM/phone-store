<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', Auth::id())->get();
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $total = 0;
        $itemsData = [];

        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $quantity = $item['quantity'];
            $price = $product->price * $quantity;

            $itemsData[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ];

            $total += $price;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
        ]);

        foreach ($itemsData as $itemData) {
            $itemData['order_id'] = $order->id;
            Order_item::create($itemData);
        }

        return response()->json([
            'message' => 'Order created successfully.',
            'order' => $order->load('items.product'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('items.product')->where('user_id', Auth::id())->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
