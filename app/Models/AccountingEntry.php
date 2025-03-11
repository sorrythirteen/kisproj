<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'amount',
        'payment_date',
    ];

    // Отношения
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
