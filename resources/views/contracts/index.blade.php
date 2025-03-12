@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Договоры</h1>
    <div class="mb-3">
        <a href="{{ route('contracts.create') }}" class="btn-minimal">Создать договор</a>
        <a href="{{ route('contracts.export') }}" class="btn-outline" style="margin-left: 10px;">Экспорт в Excel</a>
    </div>

    <!-- Поле поиска -->
    <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="Поиск по договорам...">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Поставщик</th>
                <th>Сумма</th>
                <th>Количество</th>
                <th>Дата поставки</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr class="contract-row">
                <td>{{ $contract->supplier->name }}</td>
                <td>{{ $contract->amount }}</td>
                <td>{{ $contract->quantity }}</td>
                <td>{{ $contract->delivery_date }}</td>
                <td>{{ $contract->status }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('contracts.show', $contract->id) }}" class="btn-outline mr-2">Просмотр</a>
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn-outline mr-2">Редактировать</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-minimal">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    /* Анимация пропадания */
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }

    .fade-out {
        animation: fadeOut 0.5s ease-out forwards;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const rows = document.querySelectorAll('.contract-row');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase().trim();

            if (query === '') {
                // Если поле поиска пустое, показываем все строки
                rows.forEach(row => {
                    row.classList.remove('fade-out');
                    row.style.display = '';
                });
            } else {
                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let matchFound = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(query)) {
                            matchFound = true;
                        }
                    });

                    if (matchFound) {
                        row.classList.remove('fade-out');
                        row.style.display = ''; // Показываем строку
                    } else {
                        row.classList.add('fade-out');
                        // Устанавливаем таймаут для завершения анимации перед скрытием
                        setTimeout(() => {
                            row.style.display = 'none';
                        }, 500); // Продолжительность анимации
                    }
                });
            }
        });
    });
</script>
@endsection
