@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Детали поставщика</h1>
    <p><strong>Имя:</strong> {{ $supplier->name }}</p>
    <p><strong>ИНН:</strong> {{ $supplier->inn }}</p>
    <p><strong>Банк:</strong> {{ $supplier->bank }}</p>
    <p><strong>БИК:</strong> {{ $supplier->bik }}</p>
    <p><strong>Аккаунт:</strong> {{ $supplier->account }}</p>
    <p><strong>Имя директора:</strong> {{ $supplier->director_name }}</p>
    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn-outline mr-2">Редактировать</a>
    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-minimal">Удалить</button>
    </form>
</div>
@endsection
