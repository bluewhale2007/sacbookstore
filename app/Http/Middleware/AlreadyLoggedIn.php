<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyLoggedIn
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


        if (Session()->has('loginId') && (url('admin-login')==$request->url())){
            return back();
        } 

        else if(Session()->has('GuestLoginId') && (url('login')==$request->url())){
            return back();
        }

        else if(Session()->has('DivisionLoginId') && (url('login')==$request->url())){
            return back();
        }

        else if(Session()->has('FinanceLoginId') && (url('finance-login')==$request->url())){
            return back();
        }

        // else if(Session()->has('DivisionLoginId') && (url('login')==$request->url() || url('registration')==$request->url())){
        //     return back();
        // }


        return $next($request);
    }
}
