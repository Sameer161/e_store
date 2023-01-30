<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;

class UserPanelController extends Controller
{
    public function show()
    {
        $data=[];
        $data['userorder']=order::where('userid',auth()->user()->id)->get();
        return view('admin.user.user-order',$data);
    }
    public function read()
    {
        $data=[];
        $data['userdetail']=User::where('id',auth()->user()->id)->get();
        return view('admin.user.user-detail',$data);
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
        'postal'=>$request->postal
    ];
    // dd($data);
    $updateuser->update($data);
    return redirect('userdetail');
}
}
