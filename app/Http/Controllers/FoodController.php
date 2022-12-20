<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\foods;
use App\Models\User;
use App\Models\categorie;
use App\Models\restaurant;
class FoodController extends Controller
{
    public function displayfood() //DONE
    {
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $food = foods::where("restaurant_id",$ResId)->get();
        return view('CookOrStore/DisplayFood', compact('food'));     
    }
    public function InsertFoods()
    {
        $categorie = categorie::all();
        return view('CookOrStore/AddFood',compact('categorie'));
    }
    public function insertfood(Request $request){    
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $request->validate([
            'name' => 'required',
             'price' => 'required',
                
        ]);    
        $food = new foods();   
        $food->restaurant_id = $ResId;     
        $food->name = $request->input('name');   
        $food->caloriecount = $request->input('caloriecount');
        $food->cuisine = $request->input('cuisine');
        $food->description = $request->input('description');     
        $food->category_id = $request->input('category_id');  
        $food->price = $request->input('price'); 
        $food->discountpercentage = $request->input('discountpercentage');   
        $food->available = $request->input('available');
        if($request->hasFile('image')){
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('public/CMS/assets/food_list_image'),$image_name);
            $food['image']= $image_name;  
        }
        $food->save();
        return redirect()->route('displayfood')->with('message','food Added !');   
        }
        public function EditFoods($id) 
    {
        $food = foods::find($id);
        $categorie = categorie::all();
        return view('CookOrStore/EditFood',compact('food','categorie'));
    }
    public function updatefoods(Request $request,$id){
        $food = foods::find($id);
        $food->name = $request->name;   
        $food->caloriecount = $request->caloriecount;
        $food->cuisine = $request->cuisine;
        $food->description = $request->description;     
        $food->category_id = $request->category_id;  
        $food->price = $request->price; 
        $food->discountpercentage = $request->input('discountpercentage');   
        $food->available = $request->available;
        $food->update();
        return redirect()->route('displayfood')->with('message','food updated !');  
    }
    public function deletefood(Request $request)
    {
        foods::find($request->get('id'))->delete(); 
        return response()->json(array('code' => true), 200);
    }
}
