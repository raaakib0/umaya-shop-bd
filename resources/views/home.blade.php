@extends('layouts.shared-layout')

@section('title', 'Home')

@section('content')

    <div class="container mt-5">
        <h2>🩺 Surgical Products</h2>
        <div class="row">
            {{-- @dump($products) --}}
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">📛 {{ $product['name'] }}</h5>
                            <p class="card-text text-truncate" title="{{ $product['description'] }}">
                                📝 {{ $product['description'] }}
                            </p>
                            <p>📏 <strong>Size:</strong> {{ $product['size'] }}</p>
                            <p>📂 <strong>Category:</strong> {{ $product['category'] }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <p>🏷️ <strong>Brand:</strong> {{ $product['brand'] }}</p>
                                <h6 class="text-success fw-bold">
                                    <span class="taka-symbol">৳</span> {{ number_format($product['price'], 2) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('styles')
    <style>
        .taka-symbol {
            font-size: 1.2em;
            font-weight: 700;
            margin-right: 3px;
            vertical-align: middle;
        }
        .card-text {
            min-height: 3.5em; /* keep consistent height */
        }
    </style>
    @endpush

@endsection
