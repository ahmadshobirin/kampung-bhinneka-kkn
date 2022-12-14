<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomClothingRental extends Model
{
    use HasFactory;

    protected $table = 'custom_clothing_rental';

    protected $fillable = [
        "name",
        "image",
        "price",
        "description"
    ];
}
