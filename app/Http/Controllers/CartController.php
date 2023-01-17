<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Storage;
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
                    'prid'=>$request->prid,
                    'userid'=>auth()->user()->id
                ];
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
    public function store(StoreCartRequest $request)
    {
        //
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
    public function edit()
    {
        dd('Hello');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
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
