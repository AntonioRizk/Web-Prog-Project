<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\orderstatus;
use App\Models\restaurant;
use App\Models\User;
class OrdersController extends Controller
{
    public function displayOrders()  
    {
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $orders = order::where("restaurant_id",$ResId)->get();
      
        $status =Orderstatus::all();  
       
        return view('CookOrStore/DisplayOrders', compact('orders','status'));
    } 
    public function deleteorder(Request $request)     
    {  
        order::find($request->get('id'))->delete();
        return response()->json(array('code' => true), 200);
    }
    public function displayOrderToEdit($id) //DONE
    {
    $order=Order::find($id); 
    $orderfoods = orderdetail::where('order_id',$id)->get();
    $status = orderstatus::all();
    return view('CookOrStore/EditOrder', compact('order','status','orderfoods')); 
                  } 
                  public function editorder($id,$status){   
                    $order = Order::find($id);                
                    $order->orderstatus_id = $status;
                    $order->update();
                    
                    return redirect()->route('displayOrders')->with('message','Order Updated !'); 
                }
}
