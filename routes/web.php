<?php

use App\Models\Employees;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Landing Page
Route::get('/', function () {
    return view('index');
});

//Authentication needed
Auth::routes();

/*
|--------------------------------------------------------------------------
| ADMIN ROUTE
|--------------------------------------------------------------------------
| Path atau url buat admin, owner dan manager
|
*/
Route::middleware(['auth', 'isAdmin'])->group(function(){
        Route::prefix('admin')->group(function(){
            
            Route::get('/dashboard', function () {
                return view('app.admin.dashboard');
            })->name('dashboard.admin');

            Route::resource('/profile', ProfileController::class);            
            Route::resource('/setting/role', RoleController::class);
            Route::resource('/setting/location', LocationController::class);
            Route::resource('/setting/city', CityController::class);
            Route::resource('/setting/province', ProvinceController::class);
        }); 
});


/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTE
|--------------------------------------------------------------------------
| Path atau url buat customer
|
*/
//Customer home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| EMPLOYEE ROUTE
|--------------------------------------------------------------------------
| Path atau url buat employee
|
*/
Route::middleware(['auth', 'isEmploy'])->group(function(){
    Route::prefix('emp')->group(function(){
        Route::get('/dashboard', function () {
            return view('app.admin.dashboard');
        });
    }); 
});

Route::get('/forbidden', function(){return view('forbidden');});

