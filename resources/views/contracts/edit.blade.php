@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Contract</h1>
    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $contract->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $contract->amount }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $contract->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="delivery_date">Delivery Date</label>
            <input type="date" name="delivery_date" class="form-control" value="{{ $contract->delivery_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
