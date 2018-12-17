<?php

namespace App\Http\Middleware;
use Auth;
use Redirect;
use Closure;

class CustomerMiddleware
{
    
    public function handle($request, Closure $next)
    {

        if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->ban == 0){
                
                return $next($request);

        }

            else {

                return Redirect::route('customer.login');
            }     

    }
}
