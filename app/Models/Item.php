<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'active'];

    // TODO Eloquent Задание 1: указать что таблица - products
    protected $table = 'products';

    /**
     * Scope a query to only include users of a given type.
     */
    public function scopeActive(Builder $query):void
    {
        $query->where('active',1);
    }
}
