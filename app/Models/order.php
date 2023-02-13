<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function prduct()
    {
        return $this->hasMany(Product::class,'id','prid');
    }
    protected $fillable = [
        'name','userid','phone','adress','email','city','postal','invoice','total',
    ];
}
