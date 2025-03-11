@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Дашборд</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего материалов</h5>
                    <p class="card-text">{{ $totalMaterials }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Общая цена</h5>
                    <p class="card-text">{{ $totalCost }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего бухгалтерских учетов</h5>
                    <p class="card-text">{{ $totalAccountingEntries }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего поставщиков</h5>
                    <p class="card-text">{{ $totalSuppliers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего договоров</h5>
                    <p class="card-text">{{ $totalContracts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Общая цена материалов</h5>
                    <p class="card-text">{{ $totalMaterialsValue }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
