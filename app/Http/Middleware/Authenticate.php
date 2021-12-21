<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\AccountController;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        // admin, owner, manager
        $acc = new AccountController();
        if(!$acc->isRoleName('CUSTOMER') and !$acc->isRoleName('EMPLOYEE')){
            return "/admin/dashboard";
        }
        //employee
        if(!$acc->isRoleName('EMPLOYEE')){
            return "/emp/dashboard";
        }
        //customer
        return "/";
    }
}
