@extends('layouts.shared-layout')

@section('title', $product->name)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2>📛 {{ $product->name }}</h2>
            <p>📝 {{ $product->description }}</p>
            <p>📏 <strong>Size:</strong> {{ $product->size }}</p>
            <p>📂 <strong>Category:</strong> {{ $product->category }}</p>
            <p>🏷️ <strong>Brand:</strong> {{ $product->brand }}</p>
            <h4 class="text-success fw-bold">
                <span class="taka-symbol">৳</span> {{ number_format($product->price, 2) }}
            </h4>

            <a href="{{ route('product.order.form', $product->id) }}" class="btn btn-primary mt-3">
                🛒 Order Now
            </a>
        </div>
    </div>
</div>

@endsection
