<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    //  public function prduct()
    // {
    //      return $this->hasOne(order::class,'id','prid');
    // }
}
