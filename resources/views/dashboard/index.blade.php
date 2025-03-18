@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fade-in">Дашборд</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего материалов</h5>
                    <p class="card-text">{{ $totalMaterials }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Общая цена</h5>
                    <p class="card-text">{{ $totalCost }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего бухгалтерских учетов</h5>
                    <p class="card-text">{{ $totalAccountingEntries }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего поставщиков</h5>
                    <p class="card-text">{{ $totalSuppliers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего договоров</h5>
                    <p class="card-text">{{ $totalContracts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Общая цена материалов</h5>
                    <p class="card-text">{{ $totalMaterialsValue }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart for Material Quantities -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Количество материалов по категориям</h5>
                    <canvas id="materialChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('materialChart').getContext('2d');
        var materialChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($materialNames) !!}, // Названия материалов
                datasets: [{
                    label: 'Количество материалов',
                    data: {!! json_encode($materialQuantities) !!}, // Количество материалов
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<style>
    /* Fade-in Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    /* Card Styling */
    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-weight: bold;
        color: #333;
    }

    .card-text {
        font-size: 1.2em;
        color: #555;
    }
</style>
@endsection
