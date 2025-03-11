@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Договоры</h1>
    <div class="mb-3">
        <a href="{{ route('contracts.create') }}" class="btn-minimal">Создать договор</a>
        <a href="{{ route('contracts.export') }}" class="btn-outline" style="margin-left: 10px;">Экспорт в Excel</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Поставщик</th>
                <th>Сумма</th>
                <th>Количетсво</th>
                <th>Дата поставки</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr>
                <td>{{ $contract->supplier->name }}</td>
                <td>{{ $contract->amount }}</td>
                <td>{{ $contract->quantity }}</td>
                <td>{{ $contract->delivery_date }}</td>
                <td>{{ $contract->status }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('contracts.show', $contract->id) }}" class="btn-outline mr-2">Просмотр</a>
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn-outline mr-2">Редактировать</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
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
