@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Contract</h1>
    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="delivery_date">Delivery Date</label>
            <input type="date" name="delivery_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
