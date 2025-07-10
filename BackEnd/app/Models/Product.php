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
        'image_url',
    ];

    // Relationship
    public function brand ():BelongsTo{
        return $this->belongsTo(Brand::class);
    }
}
