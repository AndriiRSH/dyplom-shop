<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use App\Models\Product;

class OrderController
{
    public function index()
    {
        $orders = Order::all();
        $products = [];
        foreach ($orders as $order) {
            $products[] = Product::whereIn('id', $order->product_ids)->get();
        }
//        dd($products[0]);
        return view('admin.order.index', compact('orders', 'products'));
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function delete(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
