@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить договор</h1>
    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="supplier_id">Поставщик</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Сумма</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="delivery_date">Дата доставки</label>
            <input type="date" name="delivery_date" class="form-control" required>
        </div>
        <button type="submit" class="btn-minimal">Добавить</button>
    </form>
</div>
@endsection
