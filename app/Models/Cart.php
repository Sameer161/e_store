<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $fillable = [
        'quantity',
    ];
    use HasFactory;
    // protected $table='products';
    public function prod()
    {
         return $this->hasOne(Product::class,'id','prid');
    }
}
