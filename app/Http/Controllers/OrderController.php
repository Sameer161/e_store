<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Cart;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use Illuminate\Http\Request;
use DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $data=[
            'name'=>$request->name,
            'userid'=>auth()->user()->id,
            'prid'=>$request->prid,
            'phone'=>$request->phone,
            'adress'=>$request->adress,
            'email'=>$request->email,
            'city'=>$request->city,
            'postal'=>$request->postal,
            'total'=>560,
            'invoice'=>random_int(100000, 999999),
            'payment'=>$request->payment
        ];
        // dd($data);
        $order=new Order;
        $order->insert($data);
        $del=DB::table('carts');
        $del->delete();
        
        return redirect('orderget');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=[];
        $data['orderget']=order::all();
        // dd($data);
        return view('main.comp',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=[];
        $data['orderget']=order::all();
        // dd($data);
        return view('admin.orders.order',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['orderdetail']=order::find($id);
        dd($data);
        return view('admin.orders.order-detail',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
