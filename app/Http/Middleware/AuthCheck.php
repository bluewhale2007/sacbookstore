<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(!Session()->has('loginId')){
            return redirect('admin-login')->with('fail', 'You have to login first.');
        }

        // if(!Session()->has('GuestLoginId')){
        //     return redirect('login')->with('fail', 'You have to login first.');
        // }

        // if(!Session()->has('FinanceLoginId')){
        //     return redirect('finance-login')->with('fail', 'You have to login first.');
        // }

        return $next($request);
    }
}
