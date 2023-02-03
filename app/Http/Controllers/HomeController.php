<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(auth()->user()->role=="1"){
            return view("admin.index");
        }
        elseif(auth()->user()->role=="2"){
            return redirect('/');
        }
    }
}
