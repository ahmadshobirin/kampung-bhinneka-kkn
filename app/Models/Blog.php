<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class,'category_id', 'id');
    }
}
