@extends('layouts.shared-layout')

@section('title', 'Order Now')

@section('content')
<div class="container mt-5">
    <h3>🛒 Order: {{ $product->name }}</h3>
    <div class="card p-4">
        <form action="{{ route('product.order.submit', $product->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="customer_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>

            <div class="mb-3">
                <label for="customer_phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="customer_phone" required>
            </div>

            <div class="mb-3">
                <label for="customer_address" class="form-label">Address</label>
                <textarea class="form-control" name="customer_address" rows="3" required></textarea>
            </div>

            <p><strong>Product:</strong> {{ $product->name }}</p>
            <p><strong>Price:</strong> ৳{{ number_format($product->price, 2) }}</p>

            <button type="submit" class="btn btn-success">📦 Confirm Order</button>
        </form>
    </div>
</div>
@endsection
