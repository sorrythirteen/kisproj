@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить поставщика</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="inn">ИНН</label>
            <input type="text" name="inn" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bank">Банк</label>
            <input type="text" name="bank" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bik">БИК</label>
            <input type="text" name="bik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="account">Аккаунт</label>
            <input type="text" name="account" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="director_name">Имя директора</label>
            <input type="text" name="director_name" class="form-control" required>
        </div>
        <button type="submit" class="btn-minimal">Добавить</button>
    </form>
</div>
@endsection
