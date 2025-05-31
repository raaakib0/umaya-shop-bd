<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showForm()
    {
        return view('order.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Order::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'product_name' => $request->product_name,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('order.thankyou');
    }

    public function thankYou()
    {
        return view('order.thankyou');
    }

public function showOrderForm($id)
{
    $product = Products::findOrFail($id);
    return view('order.form', compact('product'));
}

public function submitOrder(Request $request, $id)
{
    $product = Products::findOrFail($id);

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:20',
        'customer_address' => 'required|string|max:255',
    ]);

    Order::create([
        'product_name' => $product->name,
        'amount' => $product->price,
        'customer_name' => $request->customer_name,
        'customer_phone' => $request->customer_phone,
        'customer_address' => $request->customer_address,
        'status' => 'pending',
    ]);

    return redirect('/')->with('success', 'Your order has been placed successfully!');
}


    // For admin
    public function adminOrders()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }
}
