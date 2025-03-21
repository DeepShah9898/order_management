@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Details</h2>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>User Name:</strong> {{ $order->user->name }}</p>
    <p><strong>Grand Total:</strong> {{ $order->grand_total }}</p>
    <p><strong>Created At:</strong> {{ $order->created_at }}</p>
    
    <h3>Products</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->amount }}</td>
                <td>{{ $product->pivot->quantity * $product->pivot->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection
