<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'inn',
        'bank',
        'bik',
        'account',
        'director_name',
        'chief_accountant_name',
    ];

    // Отношения
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
