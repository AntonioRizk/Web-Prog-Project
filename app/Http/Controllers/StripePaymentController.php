<?php

namespace App\Http\Controllers;

use App\Models\order;
use Stripe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('User/userorderlayout/stripe');
    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);  
        $order = order::where("user_id",auth()->user()->id)->get();
        $order->financialstatemment = 1;
        $order->update();  
        Session::flash('success', 'Payment successful!');       
        return redirect()->route('userDashboard')->with('message','Order Added !');
    }
}
