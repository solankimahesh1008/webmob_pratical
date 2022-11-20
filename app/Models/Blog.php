<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description',];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blogs_categories', 'blogs_id', 'categories_id');
    }
}
