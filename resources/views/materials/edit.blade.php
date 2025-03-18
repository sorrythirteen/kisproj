@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать</h1>
    <form action="{{ route('materials.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ $material->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" class="form-control" value="{{ $material->price }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input type="number" name="quantity" class="form-control" value="{{ $material->quantity }}" required>
        </div>
        <button type="submit" class="btn-minimal">Обновить</button>
    </form>
</div>
@endsection
