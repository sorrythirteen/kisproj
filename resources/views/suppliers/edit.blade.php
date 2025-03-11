@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="inn">INN</label>
            <input type="text" name="inn" class="form-control" value="{{ $supplier->inn }}" required>
        </div>
        <div class="form-group">
            <label for="bank">Bank</label>
            <input type="text" name="bank" class="form-control" value="{{ $supplier->bank }}" required>
        </div>
        <div class="form-group">
            <label for="bik">BIK</label>
            <input type="text" name="bik" class="form-control" value="{{ $supplier->bik }}" required>
        </div>
        <div class="form-group">
            <label for="account">Account</label>
            <input type="text" name="account" class="form-control" value="{{ $supplier->account }}" required>
        </div>
        <div class="form-group">
            <label for="director_name">Director Name</label>
            <input type="text" name="director_name" class="form-control" value="{{ $supplier->director_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
