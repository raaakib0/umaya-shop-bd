@extends('layouts.side-layout')

@section('admin-content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">➕ Add New Product</h2>
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

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('admin.store-products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">🛍️ Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">🖼️ Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">💵 Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category">📂 Category </label>
                            <input type="text" name="category" class="form-control"  value="{{ old('category') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="brand">🏷️ Brand <span class="text-danger">*</span></label>
                            <input type="text" name="brand" class="form-control" required value="{{ old('brand') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="manufacturer">🏭 Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" value="{{ old('manufacturer') }}">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-success px-5 py-2">
                            <i class="fas fa-plus-circle"></i> Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
