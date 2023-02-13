<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    public function index()
    {
        $details=
        [
            'title' => 'Mail from Hexashop',
            'body' =>  [
                'name'=>'Sameer',
            ],
        ];
        Mail::to('sameerdeveloper90@gmail.com')->send(new \App\Mail\MyTestMail($details));
        dd("Email is Sent.");
    }
    public function create(Request $request)
    {
        // dd($request);
        if($request->payment=='cash on delivery')
        {
            $data=[];
            $data=[
                'name'=>$request->name,
                'userid'=>auth()->user()->id,
                'phone'=>$request->phone,
                'adress'=>$request->adress,
                'email'=>$request->email,
                'city'=>$request->city,
                'postal'=>$request->postal,
                'invoice'=>random_int(100000, 999999),
                'total'=>$request->sutotal,
            ];

            // dd($data);
            
            $n=order::create($data);
            // dd($n);
            $orderdet=$request->all();
            unset($orderdet['_token']);
            foreach ($orderdet['quantity'] as $key => $value) {
                $data=[
                    'quantity'=>$value,
                    'orderid'=>$n->id,
                    'prid'=>$orderdet['prid'][$key],
                    'price'=>$orderdet['price'][$key],
                    'payment'=>$orderdet['payment'],
                    'prname'=>$orderdet['prname'][$key],
                ];
                // dd($data);
                $new=new OrderDetail;
                $new->insert($data);
            }


            $del=Cart::where('userid',auth()->user()->id)->delete();
            $mai=OrderDetail::with('orderdetail')->where('orderid',$n->id)->get();
            // dd($mai);
            $details=
            [
                'title' => 'Mail from Hexashop',
                'body' =>  $mai,
            ];
            // Mail::to(auth()->user()->email)->send(new \App\Mail\MyTestMail($details));
            Mail::to('sameerdeveloper90@gmail.com')->send(new \App\Mail\MyTestMail($details));
            return redirect('orderget');

        }
        else
        {
            return redirect('stripe');
        }
    }
    public function store()
    {
        $data=[];
        $data['orderget']=order::where('userid',auth()->user()->id)->get();
        // dd($data);
        return view('main.comp',$data);
    }
    public function show()
    {
        $data=[];
        $data['orderget']=order::all();
        // dd($data);
        return view('admin.orders.order',$data);
    }
    public function edit()
    {
        $data=[];
        $idget=order::select('id')->where('userid',auth()->user()->id)->get();
        $hell=$idget[0]['id'];
        $data['orderdetail']=OrderDetail::where('orderid',$hell);
        dd($data);
        return view('admin.orders.order-detail',$data);
    }
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }
    public function destroy(order $order)
    {
        //
    }
}
