@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Total</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->grand_total }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
