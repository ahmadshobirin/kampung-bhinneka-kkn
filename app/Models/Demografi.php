<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    use HasFactory;

    protected $fillable = [
        "neighborhood",
        "head_of_family",
        "inhabitant",
        "toddler",
        "elderly",
    ];
}
