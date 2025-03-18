<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест кнопок</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .chart-container {
            position: relative;
            margin: auto;
            height: 40vh;
            width: 60vw;
        }
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
        /* Back to Dashboard Button */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Back to Dashboard Button -->
    <a href="{{ route('dashboard') }}" class="btn btn-secondary back-button">Дашборд</a>

    <h1 class="fade-in text-center">Тест</h1>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего материалов</h5>
                    <p class="card-text">{{ $totalMaterials ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Общая цена</h5>
                    <p class="card-text">{{ $totalCost ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего бухгалтерских учетов</h5>
                    <p class="card-text">{{ $totalAccountingEntries ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего поставщиков</h5>
                    <p class="card-text">{{ $totalSuppliers ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Всего договоров</h5>
                    <p class="card-text">{{ $totalContracts ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <div class="card-body">
                    <h5 class="card-title">Общая цена материалов</h5>
                    <p class="card-text">{{ $totalMaterialsValue ?? 'N/A' }}</p>
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

    <!-- Buttons -->
    <div class="mb-4 mt-4">
        <h2>Buttons</h2>
        <button type="button" class="btn btn-primary">Primary Button</button>
        <button type="button" class="btn btn-secondary">Secondary Button</button>
        <button type="button" class="btn btn-success">Success Button</button>
        <button type="button" class="btn btn-danger">Danger Button</button>
        <button type="button" class="btn btn-warning">Warning Button</button>
        <button type="button" class="btn btn-info">Info Button</button>
        <button type="button" class="btn btn-light">Light Button</button>
        <button type="button" class="btn btn-dark">Dark Button</button>
    </div>

    <!-- Sliders -->
    <div class="mb-4">
        <h2>Sliders</h2>
        <div class="form-group">
            <label for="customRange1">Example range</label>
            <input type="range" class="form-control-range" id="customRange1">
        </div>
        <div class="form-group">
            <label for="customRange2">Example range with min and max</label>
            <input type="range" class="form-control-range" id="customRange2" min="0" max="5">
        </div>
    </div>

    <!-- Toggle Switches -->
    <div class="mb-4">
        <h2>Toggle Switches</h2>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
        </div>
    </div>

    <!-- Progress Bars -->
    <div class="mb-4">
        <h2>Progress Bars</h2>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
        </div>
        <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('materialChart').getContext('2d');
        var materialChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Дерево', 'Металл', 'Пластик', 'Другое'],
                datasets: [{
                    label: 'Количество материалов',
                    data: [12, 19, 3, 5], // Replace with actual data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
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
</body>
</html>
