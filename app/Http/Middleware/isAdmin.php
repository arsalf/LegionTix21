<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AccountController;
use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        $acc = new AccountController();
        if(!$acc->isRoleName('CUSTOMER') and !$acc->isRoleName('EMPLOYEE')){
            return $next($request);
        }
        //page error
        return redirect("/forbidden");
    }
}
