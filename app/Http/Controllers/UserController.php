<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\foods;
use App\Models\order;
use App\Models\review;
use App\Models\User;
use App\Models\restaurant;
use App\Models\offer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userhome()
    {
        $restaurants = restaurant::all();
        return view('User/UserHome', compact('restaurants'));
    }


    public function menudisplay($id)
    {
        $offers = offer::where("restaurant_id", $id)->get();
        $category = categorie::where("restaurant_id", $id)->get();
        $food = foods::where("restaurant_id", $id)->get();
        $restau = $id;
        return view('User/CategoryMenu', compact('category', 'food','restau','offers'));
    }

    public function Categorydisplay($resid, $catid)
    {
        $restaurant = restaurant::find($resid);  
        $category = categorie::find($catid);
        $categoryfoodId = $category->id;
        $food = foods::where("category_id", $categoryfoodId)->get();
        return view('User/CategoryFood', compact('category', 'food', 'restaurant'));
    }
    
    public function DisplayReview($id)
    {
        $resid = $id;
        return view('User/Review',compact('resid'));
    }


    public function AddReview(Request $request,$id)
    {
        $review = new review();
        $review->comment = $request->input('comment');
        $review->rating = $request->input('rating');
        $review->restaurant_id = $id;
        $review->save();
        return redirect()->route('userDashboard')->with('message','Review Added !'); 
    }
    
    public function displayUserOrders()  
    {
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();   
        $userid = $user->id;
        $orders = order::where("user_id",$userid)->get();    
        return view('User/UserOrders', compact('orders'));
    } 
  public function searchfoodbyname(Request $request){
    $food = foods::where('name',$request->name)->get();
    return view('User/SearchFoodMenu', compact('food'));
  }
  
}
  
