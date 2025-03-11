@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contracts</h1>
    <a href="{{ route('contracts.create') }}" class="btn btn-primary">Create Contract</a>
    <a href="{{ route('contracts.export') }}" class="btn btn-success">Export Contracts</a>
    <table class="table">
        <thead>
            <tr>
                <th>Supplier</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr>
                <td>{{ $contract->supplier->name }}</td>
                <td>{{ $contract->amount }}</td>
                <td>{{ $contract->quantity }}</td>
                <td>{{ $contract->delivery_date }}</td>
                <td>{{ $contract->status }}</td>
                <td>
                    <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
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
