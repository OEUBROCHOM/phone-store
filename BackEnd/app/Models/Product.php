<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'price',
        'ram',
        'brand_id',
        'image_url',
    ];

     public function getImageUrlAttribute($value)
    {
        return $value ? url($value) : null;
    }

    // Relationship
    public function brand ():BelongsTo{
        return $this->belongsTo(Brand::class);
    }
}
