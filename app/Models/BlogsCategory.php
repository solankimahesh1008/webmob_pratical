<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsCategory extends Model
{
    use HasFactory;

    protected $table = 'blogs_categories';
    protected $fillable=['blogs_id','categories_id'];
}
