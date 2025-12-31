<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Product $product)
    {
        $quantity = 1; // versi aman: beli 1 item

        $subtotal = $product->price * $quantity;

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $subtotal,
            'status' => 'paid'
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $quantity,
            'subtotal' => $subtotal
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Checkout berhasil!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }
}
