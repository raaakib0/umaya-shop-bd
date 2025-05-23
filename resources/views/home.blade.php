
@extends('shared-layout')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
        <h2>Surgical Products</h2>
        <div class="row">
            {{-- @dump($products) --}}
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p><strong>Size:</strong> {{ $product['size'] }}</p>
                            <p><strong>Price:</strong> ${{ $product['price'] }}</p>
                            <p><strong>Brand:</strong> {{ $product['brand'] }}</p>
                            <p><strong>Category:</strong> {{ $product['category'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
   