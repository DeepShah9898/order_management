@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>Welcome to Orders Project</h1>
    <p class="lead">Manage your orders efficiently with our system.</p>
    <a href="{{ route('orders.index') }}" class="btn btn-primary">Start ordering from here</a>
</div>
@endsection
