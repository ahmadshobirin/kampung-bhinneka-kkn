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
        "demografis_id",
        "image",
        "thumbnail",
        "name",
        "address",
        "business_type",
        "description",
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


}
