@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать поставщика</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="inn">ИНН</label>
            <input type="text" name="inn" class="form-control" value="{{ $supplier->inn }}" required>
        </div>
        <div class="form-group">
            <label for="bank">Банк</label>
            <input type="text" name="bank" class="form-control" value="{{ $supplier->bank }}" required>
        </div>
        <div class="form-group">
            <label for="bik">БИК</label>
            <input type="text" name="bik" class="form-control" value="{{ $supplier->bik }}" required>
        </div>
        <div class="form-group">
            <label for="account">Аккаунт</label>
            <input type="text" name="account" class="form-control" value="{{ $supplier->account }}" required>
        </div>
        <div class="form-group">
            <label for="director_name">Имя директора</label>
            <input type="text" name="director_name" class="form-control" value="{{ $supplier->director_name }}" required>
        </div>
        <button type="submit" class="btn-minimal">Обновить</button>
    </form>
</div>
@endsection
