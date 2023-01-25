<?php
use App\Models\Cart;
function changeDateFormate(){
   // $data=Cart::where('userid',auth()->user()->id)->get()->sum('quantity');
   $data=Cart::get()->sum('quantity');
   return ($data);    
}

function totalprice(){
   $toprice=Cart::where('userid', auth()->user()->id)->get()->sum('price');
   return ($toprice);
}
