<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated()
    {


        // admin login dashboard
        if(Auth::user()->role_id == '1') 
        {
            return redirect('/AdminDashboard')->with('status','Welcome to your dashboard');
        }
        //user login dashboard
        elseif(Auth::user()->role_id == '2')  
        {
            return redirect('/UserDashboard');  
        }
        //restaurant dashboard
        elseif(Auth::user()->role_id == '3') 
        {
            return redirect('/RestaurantDashboard'); 
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
