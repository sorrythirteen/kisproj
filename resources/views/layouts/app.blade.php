<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лесопилка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Franklin Gothic Medium', monospace;
            background-image: url('/images/background.jpg'); /* Путь к изображению */
            background-size: cover; 
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom-left-radius: 15px;
            border-bottom-right-radius:15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: #333 !important;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #0066cc !important;
            transform: translateY(-2px);
        }

        .container {
            background-color: rgb(255, 255, 255);
            padding: 5px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1700px;
            margin: 5px auto;
            text-align: center;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn-minimal {
            background-color:rgb(97, 208, 236);
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        

        .btn-minimal:hover {
            background-color: rgb(83, 183, 207);
            transform: translateY(-2px);
        }

        .btn-minimal:active {
            background-color: #37474f;
            transform: translateY(0);
        }

        .btn-delete {
            background-color:rgb(206, 57, 57);
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        

        .btn-delete:hover {
            background-color: rgb(83, 183, 207);
            transform: translateY(-2px);
        }

        .btn-delete:active {
            background-color: #37474f;
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }


        #copy-notification {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #copy-notification.show {
            opacity: 1;
        }

    </style>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand fade-in" href="{{ route('dashboard') }}">КИС-Лесопилка</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link fade-in" href="{{ route('dashboard') }}">Дашборд</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fade-in" href="{{ route('suppliers.index') }}">Поставщики</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fade-in" href="{{ route('contracts.index') }}">Договоры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fade-in" href="{{ route('materials.index') }}">Материалы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fade-in" href="{{ route('accounting_entries.index') }}">Бухгалтерские записи</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">Здравствуйте, {{ auth()->user()->name }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @endauth
    <div class="container mt-4 fade-in">
        <a href="{{ route('dashboard') }}">
            <!-- <button class="btn-minimal">Go to Dashboard</button> -->
        </a>
        @yield('content')
    </div>

    <!-- Уведомление о копировании -->
    <div id="copy-notification">Скопировано!</div>

    <script>
        document.addEventListener('copy', function(event) {
            // Убираем выделение после копирования
            window.getSelection().removeAllRanges();

            // Показываем уведомление
            const notification = document.getElementById('copy-notification');
            notification.classList.add('show');

            // Скрываем уведомление через 1.5 секунды
            setTimeout(() => {
                notification.classList.remove('show');
            }, 1500);
        });
    </script>
</body>
</html>
