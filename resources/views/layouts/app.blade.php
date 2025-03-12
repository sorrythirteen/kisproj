<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лесопилка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        ::selection {
            background: #617d8a; /* Цвет фона выделения */
            color: #fff; /* Цвет текста при выделении */
        }
        ::-ms-selection {
            background: #617d8a;
            color: #fff;
        }
        body, html {
            height: 100%;
            margin: 0;
        }
        body {
            font-family: 'Franklin Gothic Medium', monospace;
            color: #333;
            margin: 0;
            padding: 0;
            background-image: url('/images/background.jpg'); /* Путь к изображению */
            background-size: cover; /* Масштабирование фона */
            background-position: center; /* Центрирование фона */
            background-repeat: repeat; /* Отключение повторения фона */
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #fff !important;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: #333 !important;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #0066cc !important;
            transform: translateY(-2px);
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 95%; /* Ширина контейнера */
            max-width: 100%; /* Максимальная ширина */
            margin: 20px auto;
            text-align: auto; /* Центрирование текста внутри контейнера */
        }

        .table {
            margin: auto; /* Центрирование таблицы внутри контейнера */
            width: 50% auto;
        }

        /* Новые стили для кнопок */
        .btn-minimal {
            background-color: #607d8b; /* Основной серый цвет */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .btn-minimal:hover {
            background-color: rgb(55, 71, 79); /* Темно-серый цвет при наведении */
            transform: translateY(-2px); /* Легкий эффект поднятия */
        }

        .btn-minimal:active {
            background-color: #37474f; /* Еще более темный серый при нажатии */
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            color: #607d8b;
            border: 2px solid #607d8b;
            border-radius: 5px;
            padding: 13px 28px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .btn-outline:hover {
            background-color: #607d8b;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-outline:active {
            background-color: #455a64;
            color: #fff;
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

        /* Align the logout and greeting to the right */
        .navbar-nav.ml-auto {
            margin-left: auto !important;
        }

        /* Стиль для сообщения о копировании */
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
