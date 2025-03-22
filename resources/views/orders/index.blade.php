@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Orders List</h2>
            <a href="{{ route('orders.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Order
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Total (₹)</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td><strong>#{{ $order->id }}</strong></td>
                        <td>{{ $order->user->name }}</td>
                        <td><span class="text-success fw-bold">₹{{ number_format($order->grand_total, 2) }}</span></td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                {{-- <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $order->id }})">
                                    <i class="bi bi-trash"></i> Delete
                                </button> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Script -->
{{-- <script>
    function confirmDelete(orderId) {
        if (confirm("Are you sure you want to delete this order?")) {
            // Redirect to delete route (Ensure you have a delete route in your controller)
            window.location.href = `/orders/${orderId}/delete`;
        }
    }
</script> --}}
@endsection
