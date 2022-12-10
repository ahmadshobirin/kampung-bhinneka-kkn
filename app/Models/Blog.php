<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class,'user_id', 'id');
    }

    public function category()
    {
        return $this->hasMany(\App\BlogCategory::class, 'blog_id', 'id');
    }
}
