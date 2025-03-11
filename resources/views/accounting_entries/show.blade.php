@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Accounting Entry Details</h1>
    <p><strong>Contract:</strong> {{ $accountingEntry->contract->supplier->name }} - {{ $accountingEntry->contract->amount }}</p>
    <p><strong>Amount:</strong> {{ $accountingEntry->amount }}</p>
    <p><strong>Payment Date:</strong> {{ $accountingEntry->payment_date }}</p>
    <a href="{{ route('accounting_entries.edit', $accountingEntry->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('accounting_entries.destroy', $accountingEntry->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
