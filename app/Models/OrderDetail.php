<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function orderdetail()
    {
        return $this->belongsTo(order::class,'orderid','id');
    }
}
