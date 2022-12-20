<?php

namespace App\Http\Controllers;

use App\Models\restaurant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function MainRestaurants()
    {
        Session::put('AdminPage', 'Requests');
        return view(
            'Admin/AdminDashboard',
            [
                'Requests' => restaurant::where('approved', 0)->get()
            ]
        );
    }
    public function searchUser(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view(
            'Admin/AdminDashboard',
            [
                'Users' => $posts
            ]
        );
    }
    public function searchResto(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = restaurant::query()
            ->where('id', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view(
            'Movies.movielist',
            [
                'movies' => $posts
            ]
        );
    }
    public function Main()
    {
        Session::put('AdminPage', 'Users');
        return view(
            'Admin/AdminDashboard',
            [
                'Users' => User::all()
            ]
        );
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect::to(
            'Admin/AdminDashboard'
        )->with('Users', User::all());
    }

    
    public function deleteResto($id)
    {
        restaurant::find($id)->delete();
        return view(
            'Admin/AdminDashboard',
            [
                'Requests' => restaurant::where('approved', 0)
            ]
        );
    }
    public function acceptResto($id)
    {
        $resto= restaurant::find($id);
        $resto->approved = 1;
        $resto->save();
        
        return view(
            'Admin/AdminDashboard',
            [
                'Requests' => restaurant::where('approved', 0)->get()
            ]
        );
    }
}