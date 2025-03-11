<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    use HasFactory;

    // Укажите таблицу, если имя отличается от стандартного
    protected $table = 'data_models';

    // Укажите поля, которые можно массово назначать
    protected $fillable = [
        'field1',
        'field2',
        'field3',
        // Добавьте другие поля, которые можно заполнять
    ];

    // Если есть поля, которые не должны быть массово назначены
    protected $guarded = [];

    // Определите отношения, если они есть
    // public function relatedModel()
    // {
    //     return $this->hasMany(RelatedModel::class);
    // }

    // Вы можете добавить методы для работы с данными
    public function scopeFilterByField1($query, $value)
    {
        return $query->where('field1', 'like', '%' . $value . '%');
    }

    public function scopeFilterByField2($query, $value)
    {
        return $query->where('field2', $value);
    }

    // Добавьте другие методы фильтрации по мере необходимости
}
