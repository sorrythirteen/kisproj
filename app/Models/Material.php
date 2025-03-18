<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'quantity'
    ];

    public function contracts()
    {
        return $this->belongsToMany(Contract::class, 'contract_material')
                    ->withPivot('quantity') // Если нужно получить quantity из связующей таблицы
                    ->withTimestamps(); // Если в связующей таблице есть created_at и updated_at
    }
}
