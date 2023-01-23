<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['title', 'active'];

    // TODO Eloquent Задание 1: указать что таблица - products

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
