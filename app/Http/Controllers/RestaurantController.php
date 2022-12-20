<?php

namespace App\Http\Controllers;

use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RestaurantController extends Controller
{
    public function restaurantdash() //DONE
    {
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->get();
        return view('CookOrStore/Settings', compact('store'));  
    }
    public function loginview(){
        return view('CookOrStore/Restaurantlogin');
     } 
     public function registerview(){
        return view('CookOrStore/Restaurantregister');
     } 
    public function displaystoretoedit($id){
      $store = restaurant::find($id);
      return view('CookOrStore/EditRestaurant', compact('store'));   
    }     
    public function editrestaurant(Request $request,$id){
     $store = restaurant::find($id);
     $store->name = $request->name;
     $store->phone = $request->phone;
     $store->address = $request->address; 
     $store->name = $request->name;
     $store->delivery_fee = $request->delivery_fee;
     $store->active = $request->active;
    if($request->hasFile('mainimage')){
        $image = $request->file('mainimage');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('public/CMS/assets/restaurant_list_image'),$image_name);
        $store['mainimage']= $image_name;
    }
    $store->save();
    return redirect()->route('restaurantDashboard')->with('message','Updated!'); 
    }
}     
