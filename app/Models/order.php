<?php

namespace App\Models;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function prduct()
    {
        return $this->hasMany(Cart::class,'id','prid');
    }
}
