<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materials;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'amount',
        'delivery_date',
        'status',
        'created_at',
        'updated_at',
    ];

    // Отношения
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function accountingEntries()
    {
        return $this->hasMany(AccountingEntry::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'contract_material')
                    ->withPivot('quantity') // Если нужно получить quantity из связующей таблицы
                    ->withTimestamps(); // Если в связующей таблице есть created_at и updated_at
    }
}
