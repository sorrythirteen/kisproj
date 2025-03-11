@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Accounting Entry</h1>
    <form action="{{ route('accounting_entries.update', $accountingEntry->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="contract_id">Contract</label>
            <select name="contract_id" class="form-control" required>
                @foreach($contracts as $contract)
                <option value="{{ $contract->id }}" {{ $accountingEntry->contract_id == $contract->id ? 'selected' : '' }}>{{ $contract->supplier->name }} - {{ $contract->amount }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $accountingEntry->amount }}" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" name="payment_date" class="form-control" value="{{ $accountingEntry->payment_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
