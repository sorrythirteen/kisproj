@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Материалы</h1>
    <p><strong>Имя:</strong> {{ $material->name }}</p>
    <p><strong>Цена:</strong> {{ $material->price }}</p>
    <p><strong>Количество:</strong> {{ $material->quantity }}</p>
    <a href="{{ route('materials.edit', $material->id) }}" class="btn-outline mr-2">Редактировать</a>
    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-minimal">Удалить</button>
    </form>
</div>
@endsection
