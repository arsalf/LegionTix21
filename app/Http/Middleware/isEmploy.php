<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isEmploy
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
        if(auth()->user()->role_id == 4){
            return $next($request);
        }
        //page error
        return redirect("/forbidden");
    }
}
