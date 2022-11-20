<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blogs_categories', 'categories_id', 'blogs_id');
    }
}
