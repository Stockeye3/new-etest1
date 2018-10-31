<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class customerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    
    public function showLoginForm()
    {
        return view('auth.customer-login');
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
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
}