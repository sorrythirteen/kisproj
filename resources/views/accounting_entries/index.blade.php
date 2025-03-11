@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Бухгалтерия</h1>
    <div class="mb-3">
        <a href="{{ route('accounting_entries.create') }}" class="btn-minimal">Создать учет</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Договор</th>
                <th>Количетсво</th>
                <th>Дата оплаты</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountingEntries as $accountingEntry)
            <tr>
                <td>{{ $accountingEntry->contract->supplier->name }}</td>
                <td>{{ $accountingEntry->amount }}</td>
                <td>{{ $accountingEntry->payment_date }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('accounting_entries.show', $accountingEntry->id) }}" class="btn-outline mr-2">Просмотр</a>
                        <a href="{{ route('accounting_entries.edit', $accountingEntry->id) }}" class="btn-outline mr-2">Редактировать</a>
                        <form action="{{ route('accounting_entries.destroy', $accountingEntry->id) }}" method="POST" style="display:inline;">
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
