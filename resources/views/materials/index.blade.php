@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fade-in">Материалы</h1>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('materials.create') }}" class="btn-minimal">Добавить материал</a>
        </div>
        <div class="search-container">
            <input type="text" id="search" class="form-control" placeholder="Поиск по материалам...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover fade-in">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                <tr class="material-row">
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->price }}</td>
                    <td>{{ $material->quantity }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('materials.show', $material->id) }}" class="btn-minimal">Просмотр</a>
                            <a href="{{ route('materials.edit', $material->id) }}" class="btn-minimal">Редактировать</a>
                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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

    /* Fade-out Animation */
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

    /* Search Container */
    .search-container {
        width: 300px;
        margin-left: auto;
    }

    /* Button Styling */
    .btn-minimal, .btn-outline {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-minimal:hover, .btn-outline:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const rows = document.querySelectorAll('.material-row');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase().trim();

            if (query === '') {
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
                        row.style.display = '';
                    } else {
                        row.classList.add('fade-out');
                        setTimeout(() => {
                            row.style.display = 'none';
                        }, 500);
                    }
                });
            }
        });
    });
</script>
@endsection
