@extends('layouts.side-layout')

@section('admin-content')

    <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">📦 All Products</h2>
        </div>

    <table class="table table-bordered table-hover ">
        <thead class="thead-dark ">
            <tr class="text-center">
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
        <tbody class="text-center">
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

                        <a class="btn btn-sm btn-primary"
                            href="{{ route('admin.edit-products', ['id' => $product->id]) }}">Edit</a>

                        <!-- Trigger Delete Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $product->id }}">
                            Delete
                        </button>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-sm">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">🗑️ Confirm Delete
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>

                                        <form action="{{ route('admin.delete-products', ['id' => $product->id]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
