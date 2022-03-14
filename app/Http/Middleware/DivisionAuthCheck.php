<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DivisionAuthCheck
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
        if(!Session()->has('DivisionLoginId')){
            return redirect('login')->with('fail', 'You have to login first.');
        }
        return $next($request);
    }
}
