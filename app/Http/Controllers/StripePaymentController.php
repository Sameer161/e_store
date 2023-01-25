<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
     public function stripe()
    {
        return view('main.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 20 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test Payment from Ecommerce" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return redirect('/orderget');
    }
}
