@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supplier Details</h1>
    <p><strong>Name:</strong> {{ $supplier->name }}</p>
    <p><strong>INN:</strong> {{ $supplier->inn }}</p>
    <p><strong>Bank:</strong> {{ $supplier->bank }}</p>
    <p><strong>BIK:</strong> {{ $supplier->bik }}</p>
    <p><strong>Account:</strong> {{ $supplier->account }}</p>
    <p><strong>Director Name:</strong> {{ $supplier->director_name }}</p>
    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
