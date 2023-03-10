<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserPanelController extends Controller
{
    public function show()
    {
        if (Auth::check())
        {   
            $data=[];
            $data['userorder']=OrderDetail::with('orderdetail')->get();
            // dd($data);
            return view('admin.user.user-order',$data);
        }
    }
    public function read($id)
    {
        if(Auth::check())
        {   
            $data=[];
            $data['userdetail']=User::where('id',auth()->user()->id)->get();
            return view('admin.user.user-detail',$data);
        }
    }
    public function edit($id)
    {
        $data=[];
        $data['userupdate']=User::find($id);
        return view('admin.user.user-update',$data);
    }
    public function update(Request $request,$id)
    {
       $updateuser=User::find($id);
       $data=[
        'name'=>$request->name,
        'email'=>$request->email,
        'adress'=>$request->adress,
        'city'=>$request->city,
        'postal'=>$request->postal,
        'date'=>Carbon::now()
    ];
    // dd($data);
    $updateuser->update($data);
    return redirect('userdetail/'.$id);
}
}
