@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Детали</h1>
    <p><strong>Договор:</strong> {{ $accountingEntry->contract->supplier->name }} - {{ $accountingEntry->contract->amount }}</p>
    <p><strong>Количество:</strong> {{ $accountingEntry->amount }}</p>
    <p><strong>Дата оплаты:</strong> {{ $accountingEntry->payment_date }}</p>
    <a href="{{ route('accounting_entries.edit', $accountingEntry->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('accounting_entries.destroy', $accountingEntry->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection
