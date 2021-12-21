<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\AccountController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        if (Auth::user()) {
            // admin, owner, manager
            $acc = new AccountController();
            if(!$acc->isRoleName('CUSTOMER') and !$acc->isRoleName('EMPLOYEE')){
                return redirect("/admin/dashboard");
            }
            //employee
            if(!$acc->isRoleName('EMPLOYEE')){
                return redirect("/emp/dashboard");
            }
            //customer
            return redirect("/");
        }

        return $next($request);
    }
}
