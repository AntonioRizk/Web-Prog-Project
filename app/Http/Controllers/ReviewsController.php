<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;
use App\Models\User;
use App\Models\restaurant;
class ReviewsController extends Controller
{
    public function displayreviews(){    
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $reviews = review::where("restaurant_id",$ResId)->get();   
        return view('CookOrStore/DisplayReview',compact('reviews'));     
    }
}
