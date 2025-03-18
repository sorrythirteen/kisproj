@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить материал</h1>
    <form action="{{ route('materials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn-minimal">Добавить</button>
    </form>
</div>
@endsection
