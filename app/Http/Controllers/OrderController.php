<?php

namespace App\Http\Controllers;

use App\Models\order;
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
        if($request->payment=='cash on delivery')
        {
            $data=$request->all();
            unset($data['_token']);
            dd($data);
            $oitem=[];
            foreach ($data['quantity'] as $key => $value) {
                $oitem=
                [
                    'quantity'=>$value,
                    'prid'=>$data['prid'][$key],
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'adress'=>$data['adress'],
                    'city'=>$data['city'],
                    'phone'=>$data['phone'],
                    'postal'=>$data['postal'],
                    'total'=>$data['sutotal'],
                    'invoice'=>random_int(100000, 999999),
                    'payment'=>$request->payment,
                    'userid'=>auth()->user()->id,
                ];
                dd($oitem);
            }
            $order=new Order;
            $order->insert($oitem);
            $oitem['price']=$data['price'][$key];
            $oitem['prname']=$data['prname'][$key];
            // dd($oitem);
            $details=
            [
                'title' => 'Mail from Hexashop',
                'body' =>  $oitem,
            ];
            // Mail::to(auth()->user()->email)->send(new \App\Mail\MyTestMail($details));
            Mail::to('sameerdeveloper90@gmail.com')->send(new \App\Mail\MyTestMail($details));
            $del=Cart::where('userid',auth()->user()->id)->delete();

            return redirect('orderget');
        }
        else{
            return redirect('stripe');
        }
        die();
        if($request->payment=='cash on delivery')
        {
            $data=[];
            $data=[
                'name'=>$request->name,
                'userid'=>auth()->user()->id,
                'prid'=>$request->prid,
                'phone'=>$request->phone,
                'adress'=>$request->adress,
                'email'=>$request->email,
                'city'=>$request->city,
                'postal'=>$request->postal,
                'total'=>$request->sutotal,
                'invoice'=>random_int(100000, 999999),
                'payment'=>$request->payment,
                'quantity'=>$request->quantity
            ];
            // dd($data);
            $order=new Order;
            $order->insert($data);

            $data['price']=$request->price;
            $data['prname']=$request->prname;
            $del=Cart::where('userid',auth()->user()->id)->delete();
            $details=
            [
                'title' => 'Mail from Hexashop',
                'body' =>  $data,
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
    public function edit($id)
    {
        $data=[];
        $data['orderdetail']=order::with('prduct')->find($id);
        // dd($data['orderdetail']->toArray());
        // dd($data);
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
