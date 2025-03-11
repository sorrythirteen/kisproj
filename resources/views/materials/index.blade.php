@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Материалы</h1>
    <div class="mb-3">
        <a href="{{ route('materials.create') }}" class="btn-minimal">Добавить материал</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Цена</th>
                <th>Количетсво</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->name }}</td>
                <td>{{ $material->price }}</td>
                <td>{{ $material->quantity }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('materials.show', $material->id) }}" class="btn-outline mr-2">Просмотр</a>
                        <a href="{{ route('materials.edit', $material->id) }}" class="btn-outline mr-2">Редактировать</a>
                        <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-minimal">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
