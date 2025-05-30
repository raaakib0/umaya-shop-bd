@extends('layouts.side-layout')

@section('admin-content')

<h2>Edit Product</h2>

<div class="container mt-4">
   

    <form action="{{ route('admin.update-products', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Product Image:</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" width="120">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('admin.all-products') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection