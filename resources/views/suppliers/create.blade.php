@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="inn">INN</label>
            <input type="text" name="inn" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bank">Bank</label>
            <input type="text" name="bank" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bik">BIK</label>
            <input type="text" name="bik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="account">Account</label>
            <input type="text" name="account" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="director_name">Director Name</label>
            <input type="text" name="director_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
