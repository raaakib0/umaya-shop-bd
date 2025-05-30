@extends('layouts.side-layout')

@section('admin-content')
    <h1>All Products</h1>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Manufacturer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="60">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->manufacturer }}</td>
                    <td>
                        @if (isset($product))
                            <a href="{{ route('admin.edit-products', ['id' => $product->id]) }}">Edit</a>
                        @endif
                        <form class="d-inline" action="{{ route('admin.delete-products', ['id' => $product->id]) }}"
                            method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="8">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
