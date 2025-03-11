@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Поставщики</h1>
    <div class="mb-3">
        <a href="{{ route('suppliers.create') }}" class="btn-minimal">Добавить поставщика</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>ИНН</th>
                <th>Банк</th>
                <th>БИК</th>
                <th>Аккаунт</th>
                <th>Имя директора</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->inn }}</td>
                <td>{{ $supplier->bank }}</td>
                <td>{{ $supplier->bik }}</td>
                <td>{{ $supplier->account }}</td>
                <td>{{ $supplier->director_name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn-outline mr-2">Просмотр</a>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn-outline mr-2">Редактировать</a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
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
