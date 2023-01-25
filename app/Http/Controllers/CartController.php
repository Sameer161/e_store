<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Storage;
use DB;
class CartController extends Controller
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
    public function create(Request $request,$id)
    {
        $product_id = $request->input('prid');
        $product_qty = $request->input('quantity');
        $prod_check = Product::where('id', $product_id)->first();

        if (Cart::where('prid', $product_id)->where('userid', auth()->user()->id)->exists()) {
            return back()->with('warning',$prod_check->name.' Already Added To Cart');
        }
        else{

            if($request->isMethod('post')){
                $data=[
                    'quantity'=>$request->quantity,
                    'price'=>$request->price*$request->quantity,
                    'prid'=>$request->prid,
                    'userid'=>auth()->user()->id
                ];
                // dd($data);
                $cartitem=new Cart;
                $cartitem->insert($data);
                return redirect()->back();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=[];
        $data['cart']=Cart::with('prod')->where('userid',auth()->user()->id)->get();
        return view('main.checkout',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::check())
        {
            $data=[];
            $data['showcart']=Cart::with('prod')->where('userid',auth()->user()->id)->get();
            return view('main.cart',$data);
            // $data['sumcart']=Cart::with('prod')->where('userid',auth()->user()->id)->sum();
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $data=$request->all();
       unset($data['_token']);
        // dd($data);
       foreach ($data['quantity'] as $key => $value) {
        $cart=[
            'quantity'=>$value,
            'price'=>$data['nprice'][$key],
            'id'=>$data['cartid'][$key]
        ];
        // dump($cart);
        $updacart=Cart::find($cart['id']);
        $updacart->update($cart);
    }
    // die();
    return redirect('/cartitem');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // $data=[];
        // $data['cartquantity']=Cart::where('userid',auth()->user()->id)->get()->sum('quantity');
        // dd($data);
        // return view('main.body',$data);
        // $newDateFormat = changeDateFormate(date('Y-m-d'),'m/d/Y');
        // dd($newDateFormat);

        // return view('main.body');

    // });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartit=Cart::find($id);
        $cartit->delete();
        return redirect('cartitem');
    }
}
