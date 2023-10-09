<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['title', 'active'];

    // TODO Eloquent Задание 1: указать что таблица - products

    public function scopeActive($query)
    {
        $query->where('active', true);
    }
}
