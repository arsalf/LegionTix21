<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Film;

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

Route::prefix('app')->group(function(){
    Route::get('/', function () {
        $data = Film::find(1);
        return view('app.home.index',[
            'data'=>$data, 
        ]);
    })->name('app');

    Route::get('/detail', function () {
        return view('app.home.film.detail');
    })->name('app.detail');

    Route::get('/ticket', function () {
        return view('app.home.film.ticket');
    })->name('app.ticket');
    
    Route::get('/kursi', function () {
        return view('app.home.film.kursi');
    })->name('app.kursi');

    Route::get('/login', function () {
        return view('app.home.login.login');
    })->name('app.login');

    Route::get('/register', function () {
        return view('app.home.login.register');
    })->name('app.register');

    Route::prefix('articel')->group(function(){
        Route::get('/', function () {
            return view('app.home.articel.index');
        })->name('app.articel');

        Route::get('/detail', function () {
            return view('app.home.articel.detail');
        })->name('app.articelDetail');
    });
});
//Authentication needed
Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

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
            Route::prefix('/setting')->group(function(){
                Route::resource('/account', AccountController::class);
                Route::resource('/role', RoleController::class);
                Route::resource('/region', ProvinceController::class);                
                Route::resource('/city', CityController::class);
                Route::resource('/district', KecamatanController::class);
                Route::resource('/village', KelurahanController::class);
                Route::resource('/film', FilmController::class);
                Route::resource('/bioskop', BioskopController::class);
            });
            
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


/*
|--------------------------------------------------------------------------
| EMPLOYEE ROUTE
|--------------------------------------------------------------------------
| Path atau url buat employee
|
*/
Route::middleware(['auth', 'isEmploy'])->group(function(){

});

Route::prefix('emp')->group(function(){
    Route::get('/dashboard', function () {
        return view('app.admin.dashboard');
    });
});

Route::get('/forbidden', function(){return view('forbidden');});

Route::get('/test', function(){
    return view('test');
});

