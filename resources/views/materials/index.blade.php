@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Materials</h1>
    <a href="{{ route('materials.create') }}" class="btn btn-primary">Create Material</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->name }}</td>
                <td>{{ $material->price }}</td>
                <td>{{ $material->quantity }}</td>
                <td>
                    <a href="{{ route('materials.show', $material->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
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
