<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Customer;
class customerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout','login');
        //$this->middleware('customer')->only('login', 'logout');
       }
 
    
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    protected function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)){

            if (Auth::guard('customer')->user()->ban == 1){
                Auth::guard('customer')->logout();
                return redirect()->route('banned');
                
            }

            else 
                return redirect()->route('home');

        }

    }


    public function showRegisterForm()
    {
        return view('auth.customer-register');
    }
    protected function guard(){
        return Auth::guard('customer');
    }
    


    public function logout(Request $request)
    {
        
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(route( 'home' ));

    }
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
}