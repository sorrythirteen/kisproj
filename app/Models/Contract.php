<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'amount',
        'quantity',
        'delivery_date',
        'status',
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
}
