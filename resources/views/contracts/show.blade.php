@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Детали договора</h1>
    <p><strong>Поставщик:</strong> {{ $contract->supplier->name }}</p>
    <p><strong>Сумма:</strong> {{ $contract->amount }}</p>
    <p><strong>Количество:</strong> {{ $contract->quantity }}</p>
    <p><strong>Дата доставки:</strong> {{ $contract->delivery_date }}</p>
    <p><strong>Статус:</strong> {{ $contract->status }}</p>
    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn-outline">Редактировать</a>
    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-minimal">Удалить</button>
    </form>
</div>
@endsection
