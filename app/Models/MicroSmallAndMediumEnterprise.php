<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroSmallAndMediumEnterprise extends Model
{
    use HasFactory;

    public const STATUS_CREATED   = "created";
    public const STATUS_PUBLISHED = "published";
    public const STATUS_UNLISTED  = "unlisted";
    public const STATUS_ARCHIVED  = "archived";

    protected $fillable = [
        "nib",
        "pic",
        'user_id',
        "demografis_id",
        "image",
        "thumbnail",
        "name",
        'slug',
        "address",
        "business_type",
        "description",
        'short_desc',
        "status",
    ];

    public function isEligble()
    {
        return $this->whereIn('status', [
            MicroSmallAndMediumEnterprise::STATUS_PUBLISHED, 
            MicroSmallAndMediumEnterprise::STATUS_UNLISTED
        ]);
    }

    public function demografi()
    {
        return $this->hasOne(Demografi::class, 'id', 'demografis_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

}
