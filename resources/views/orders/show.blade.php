@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3 text-center">Order Details</h2>
        
        <div class="row">
            <div class="col-md-6">
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>User Name:</strong> {{ $order->user->name }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Grand Total:</strong> <span class="text-success fw-bold">₹{{ number_format($order->grand_total, 2) }}</span></p>
                <p><strong>Created At:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <h3 class="mt-4">Products</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Amount (₹)</th>
                        <th>Total (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                    {{-- @dd($order->products); --}}

                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ number_format($product->pivot->amount, 2) }}</td>
                        <td><strong class="text-success">₹{{ number_format($product->pivot->quantity * $product->pivot->amount, 2) }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>
</div>
@endsection
