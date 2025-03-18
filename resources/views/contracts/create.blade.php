@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить договор</h1>
    <form action="{{ route('contracts.store') }}" method="POST" id="contractForm">
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
            <label for="materials">Материалы</label>
            <div id="materials-container">
                <div class="material-item">
                    <select name="materials[0][id]" class="form-control material-select" required>
                        <option value="">Выберите материал</option>
                        @foreach($materials as $material)
                            @if($material->quantity > 0)
                                <option value="{{ $material->id }}" data-price="{{ $material->price }}">{{ $material->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="number" name="materials[0][quantity]" class="form-control material-quantity" min="1" required>
                    <button type="button" class="btn-delete">Удалить</button>
                </div>
            </div>
            <button type="button" class="btn-minimal" id="addMaterial">Добавить материал</button>
        </div>
        <div class="form-group">
            <label for="amount">Сумма</label>
            <input type="text" name="amount" class="form-control" id="amount" readonly required>
        </div>
        <div class="form-group">
            <label for="delivery_date">Дата доставки</label>
            <input type="date" name="delivery_date" class="form-control" required>
        </div>
        <button type="submit" class="btn-minimal">Добавить</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const materialsContainer = document.getElementById('materials-container');
        const addMaterialButton = document.getElementById('addMaterial');
        let materialIndex = 1;

        addMaterialButton.addEventListener('click', function () {
            const newMaterialItem = document.createElement('div');
            newMaterialItem.classList.add('material-item');
            newMaterialItem.innerHTML = `
                <select name="materials[${materialIndex}][id]" class="form-control material-select" required>
                    <option value="">Выберите материал</option>
                    @foreach($materials as $material)
                        @if($material->quantity > 0)
                            <option value="{{ $material->id }}" data-price="{{ $material->price }}">{{ $material->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="number" name="materials[${materialIndex}][quantity]" class="form-control material-quantity" min="1" required>
                <button type="button" class="btn-minimal remove-material">Удалить</button>
            `;
            materialsContainer.appendChild(newMaterialItem);
            materialIndex++;
            updateAmount();

            // Добавляем обработчик события для кнопки удаления
            newMaterialItem.querySelector('.remove-material').addEventListener('click', function () {
                newMaterialItem.remove();
                updateAmount();
            });
        });

        materialsContainer.addEventListener('change', function () {
            updateAmount();
        });

        // Обработчик события для удаления материалов
        materialsContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-material')) {
                event.target.parentElement.remove();
                updateAmount();
            }
        });

        function updateAmount() {
            const materialSelects = document.querySelectorAll('.material-select');
            const materialQuantities = document.querySelectorAll('.material-quantity');
            let totalAmount = 0;

            materialSelects.forEach((select, index) => {
                const selectedOption = select.options[select.selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const quantity = parseInt(materialQuantities[index].value) || 0;
                totalAmount += price * quantity;
            });

            document.getElementById('amount').value = totalAmount.toFixed(2);
        }
    });
</script>
@endsection
