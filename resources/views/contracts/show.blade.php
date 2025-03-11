@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contract Details</h1>
    <p><strong>Supplier:</strong> {{ $contract->supplier->name }}</p>
    <p><strong>Amount:</strong> {{ $contract->amount }}</p>
    <p><strong>Quantity:</strong> {{ $contract->quantity }}</p>
    <p><strong>Delivery Date:</strong> {{ $contract->delivery_date }}</p>
    <p><strong>Status:</strong> {{ $contract->status }}</p>
    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
