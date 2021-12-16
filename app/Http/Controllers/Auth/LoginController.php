<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\isAdmin;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {   
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }
    
    /**
     * Replace
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo(){
        // admin, owner, manager
        $acc = new AccountController();
        //customer
        if($acc->isRoleName('CUSTOMER')){
            return "/app";
        }
        if(!$acc->isRoleName('CUSTOMER') and !$acc->isRoleName('EMPLOYEE')){
            return "/admin/dashboard";
        }
        //employee
        if(!$acc->isRoleName('EMPLOYEE')){
            return "/emp/dashboard";
        }
    }
    
}
