@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить учет</h1>
    <form action="{{ route('accounting_entries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="contract_id">Договор</label>
            <select name="contract_id" class="form-control" required>
                @foreach($contracts as $contract)
                <option value="{{ $contract->id }}">{{ $contract->supplier->name }} - {{ $contract->amount }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Количество</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Дата оплаты</label>
            <input type="date" name="payment_date" class="form-control" required>
        </div>
        <button type="submit" class="btn-minimal">Создать</button>
    </form>
</div>
@endsection
