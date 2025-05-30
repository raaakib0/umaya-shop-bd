@extends('layouts.side-layout')

@section('admin-content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">✏️ Edit Product</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('admin.update-products', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">🛍️ Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $product->name) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">🖼️ Image</label>
                            <input type="file" name="image" class="form-control-file">
                            @if ($product->image)
                                <div class="mt-2">
                                    <img src="{{ $product->image }}" alt="🚫 No Image" style="max-height: 100px;">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">💵 Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price', $product->price) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category">📂 Category</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="brand">🏷️ Brand <span class="text-danger">*</span></label>
                            <input type="text" name="brand" class="form-control" required value="{{ old('brand', $product->brand) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="manufacturer">🏭 Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" value="{{ old('manufacturer', $product->manufacturer) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="size">📏 Size</label>
                            <input type="text" name="size" class="form-control" value="{{ old('size', $product->size) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">📝 Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
