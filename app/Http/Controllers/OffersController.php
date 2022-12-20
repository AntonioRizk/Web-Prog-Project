<?php

namespace App\Http\Controllers;
use App\Models\offer;
use App\Models\User;
use App\Models\restaurant;
use App\Models\foods;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function displayoffer(){
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $food = foods::where("restaurant_id",$ResId)->first();
        $fid = $food->id;
        $offer = offer::where("food_id",$fid)->get();
       
        return view('CookOrStore/DisplayOffers', compact('offer'));   
    }
    public function InsertOffers()
    {
        $offer = offer::all();
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $food = foods::where("restaurant_id",$ResId)->get();
        return view('CookOrStore/AddOffer',compact('offer','food'));
    } 
    public function insertoffer(Request $request){ 
        $offer = new offer();
        $offer->percentage = $request->input('percentage');
        $offer->food_id = $request->input('food_id');
        $res = restaurant::where("name",auth()->user()->name)->first();
        $id = $res->id;
        $offer->restaurant_id = $id;  
        $offer->save();
        return redirect()->route('displayoffer')->with('message','offer Added !'); 
    }
    public function EditOffer($id)
    {
        $offer = offer::find($id);
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $food = foods::where("restaurant_id",$ResId)->get();
        return view('CookOrStore/EditOffer',compact('offer','food'));
    }
    public function updateoffers(Request $request,$id){    
        $offer = offer::find($id);
        $offer->percentage = $request->percentage;
        $offer->status = $request->status;
        $offer->isonetime = $request->isonetime;
        $offer->food_id = $request->food_id;
        $offer->update();
        return redirect()->route('displayoffer')->with('message','offer updated !'); 
    }
    public function deleteoffer(Request $request)
    {
        offer::find($request->get('id'))->delete(); 
        return response()->json(array('code' => true), 200);
    }
}
