<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\FuncCall;

class Cart extends Model
{
    use HasFactory;

    //Relationship
    public function items():HasMany {
        return $this->hasMany(Order::class);
    }
}
