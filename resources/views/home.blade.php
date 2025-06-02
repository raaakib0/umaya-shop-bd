@extends('layouts.shared-layout')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <h2>🩺 Surgical Products</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">📛 {{ $product->name }}</h5>
                            <p class="card-text text-truncate" title="{{ $product->description }}">
                                📝 {{ $product->description }}
                            </p>
                            <p>📏 <strong>Size:</strong> {{ $product->size }}</p>
                            <p>📂 <strong>Category:</strong> {{ $product->category }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <p>🏷️ <strong>Brand:</strong> {{ $product->brand }}</p>
                                <h6 class="text-success fw-bold">
                                    <span class="taka-symbol">৳</span> {{ number_format($product->price, 2) }}
                                </h6>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary mt-3 w-100">
                                🔍 View Details
                            </a>

                            <a href="{{ route('product.order.form', $product->id) }}" class="btn btn-primary mt-3 w-100">
                                🛒 Order Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection
