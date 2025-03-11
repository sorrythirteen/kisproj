@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Accounting Entries</h1>
    <a href="{{ route('accounting_entries.create') }}" class="btn btn-primary">Create Accounting Entry</a>
    <table class="table">
        <thead>
            <tr>
                <th>Contract</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountingEntries as $accountingEntry)
            <tr>
                <td>{{ $accountingEntry->contract->supplier->name }}</td>
                <td>{{ $accountingEntry->amount }}</td>
                <td>{{ $accountingEntry->payment_date }}</td>
                <td>
                    <a href="{{ route('accounting_entries.show', $accountingEntry->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('accounting_entries.edit', $accountingEntry->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('accounting_entries.destroy', $accountingEntry->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
