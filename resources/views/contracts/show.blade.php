@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Детали договора</h1>
    <p><strong>Поставщик:</strong> {{ $contract->supplier->name }}</p>
    <p><strong>Сумма:</strong> {{ $contract->amount }}</p>
    <p><strong>Дата доставки:</strong> {{ $contract->delivery_date }}</p>
    <p><strong>Статус:</strong> {{ $contract->status }}</p>

    <h2>Материалы</h2>
    <div class="materials-list">
        @foreach($contract->materials as $material)
            <div class="material-item">
                <span class="material-name">{{ $material->name }}</span>
                <span class="material-quantity">{{ $material->pivot->quantity }} шт.</span>
            </div>
        @endforeach
    </div>

    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn-minimal">Редактировать</a>
    <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-minimal">Удалить</button>
    </form>
</div>

<style>
    .materials-list {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .material-item {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 400px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .material-name {
        font-weight: bold;
    }

    .material-quantity {
        color: #555;
    }
</style>
@endsection
