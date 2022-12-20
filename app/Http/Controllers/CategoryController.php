<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restaurant;
use App\Models\categorie;
use App\Models\User;
class CategoryController extends Controller
{
    public function categoriedash() //DONE
    {
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $categories = categorie::where("restaurant_id",$ResId)->get(); 
        return view('CookOrStore/DisplayCategories', compact('categories')); 
    }
    public function Insertcategory()
    {
     
        return view('CookOrStore/AddCategory');
    }
    public function insertCategories(Request $request){
        $category = new categorie();
        $id = auth()->user()->id;
        $user = User::where("id",$id)->first();
        $name = $user->name;
        $store = restaurant::where("name",$name)->first();
        $ResId =  $store->id;
        $category->restaurant_id = $ResId;
        $category->name = $request->input('name');
        if($request->hasFile('image')){
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('public/CMS/assets/category_list_image'),$image_name);
            $category['image']= $image_name;  
        }
        $category->save();
        return redirect()->route('displaycategories')->with('message','category Added !');     
    }
    public function EditCategory($id) 
    {
        $category = categorie::find($id);
        
        return view('CookOrStore/EditCategory',compact('category'));
    }
    public function updatecategorie(Request $request,$id){
        $category = categorie::find($id);
        $category->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('public/CMS/assets/category_list_image'),$image_name);
            $category['image']= $image_name;  
        }
        $category->update();
        return redirect()->route('displaycategories')->with('message','category Updated !');    
    }
    public function deletecategorie(Request $request)
    {
        categorie::find($request->get('id'))->delete(); 
        return response()->json(array('code' => true), 200);
    }
}
