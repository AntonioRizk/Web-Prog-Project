<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\foods;
use App\Models\order;

class CartController extends Controller
{
    
    public function cartList()
    {
        $cartItems = cart::all();
        // dd($cartItems);
        return view('User/cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        cart::Create([
          
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id,
            'user_id' =>auth()->user()->id,    
        ]);
        session()->flash('success', 'Food is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }
    
    public function updateCart(Request $request,$id)
    {   
       
        $carts = cart::find($id); 
        
        $carts->quantity = $request->quantity;
        
        $carts->update();

        return redirect()->route('cart.list');
    }
    public function removeCart(Request $request)
    {
        $cart = cart::find($request->id); 
        $cart->delete();
        return redirect()->route('cart.list');
    }
   public function placeorder($id){
      $carts = cart::where("user_id",$id)->get();  
      return view('User/checkout',compact('carts'));      
   }

   public function updateOrders(Request $request)
   {   
      
       $orders = new order(); 
       $orders->orderno = $request->orderno;
       $orders->datetime = $request->datetime;
       $orders->shippingaddress = $request->shippingaddress;
       $orders->total = $request->total;
       $orders->quantity = $request->quantity;
     
       $orders->food_id = $request->food_id;
       $orders->user_id = $request->user_id;
       $orders->restaurant_id = $request->restaurant_id;  
       $orders->save();
       $carts = cart::where("user_id",auth()->user()->id)->get();
       $carts->each->delete();

       return redirect()->route('paymentchoices')->with('message','Order Placed !');   
   }
   public function paymentchoices(){
    return view('User/PaymentChoice');   
}

}
  