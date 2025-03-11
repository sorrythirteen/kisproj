@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Material Details</h1>
    <p><strong>Name:</strong> {{ $material->name }}</p>
    <p><strong>Price:</strong> {{ $material->price }}</p>
    <p><strong>Quantity:</strong> {{ $material->quantity }}</p>
    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
