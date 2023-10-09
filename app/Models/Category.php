<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\article;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title'];

    /**
     * The article t
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function article()
    {
        return $this->belongsToMany(article::class, 'article_category', 'article_id', 'category_id');
    }
}
