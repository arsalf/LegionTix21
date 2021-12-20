<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'alpha_dash', 'max:50', 'unique:account'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $account = new Account;
        $account->username = $data['username'];
        $account->email = $data['email'];
        $account->password = Hash::make($data['password']);
        $account->role_name = 'ADMIN';
        $account->save();
        return $account;
    }

    public function redirectTo(){
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
