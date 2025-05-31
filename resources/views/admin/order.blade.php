@extends('layouts.side-layout')

@section('admin-content')
<div class="container">
    <h2 class="mb-4">📦 All Orders</h2>

    @forelse ($orders as $order)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-2">
                    <strong>{{ $order->customer_name }}</strong>
                    <span class="text-muted small">({{ $order->customer_phone }})</span>
                </h5>

                <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> {{ $order->customer_address }}</p>
                <p class="mb-1"><i class="bi bi-box-seam"></i> Product: <strong>{{ $order->product_name }}</strong></p>
                <p class="mb-2"><i class="bi bi-currency-dollar"></i> Amount: ${{ number_format($order->amount, 2) }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge 
                        {{ $order->status === 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                        {{ ucfirst($order->status) }}
                    </span>

                    {{-- Optional: Mark as complete button --}}
                    @if($order->status === 'pending')
                        <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                Mark as Completed
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">No orders found.</p>
    @endforelse
</div>
@endsection
