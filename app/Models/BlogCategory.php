<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $guarded = ['id'];

    public function blog()
    {
        return $this->hasMany(\App\Blog::class, 'id', 'blog_id');
    }

}
