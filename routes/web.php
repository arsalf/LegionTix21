<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\FilmControllers;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TiketControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Film;
use Carbon\Carbon;
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
Route::prefix('app')->group(function(){
    Route::get('/', function () {
        $filmRating = Film::orderBy('rating', 'asc')->paginate(3);
        $filmOnGoing = Film::orderBy('title', 'asc')->paginate(6);
        $filmComingSoon = Film::orderBy('id', 'desc')->paginate(6);
        // $filmOnGoing = Film::where('release_date', '<', $current_timestamp = Carbon::now()->timestamp)->orderBy('rating', 'asc')->paginate(6);
        // $filmComingSoon = Film::where('release_date', '>', $current_timestamp = Carbon::now()->timestamp)->orderBy('rating', 'asc')->paginate(6);
        return view('app.home.index',[
            'filmRating'=>$filmRating,
            'filmOnGoing'=>$filmOnGoing,
            'filmComingSoon'=>$filmComingSoon,
        ]);
    })->name('app');

    Route::get('/login', function () {
        return view('app.home.login.login');
    })->name('app.login');
    
    Route::get('/register', function () {
        return view('app.home.login.register');
    })->name('app.register');

    Route::middleware(['auth', 'IsCostumer'])->group(function(){
        Route::prefix('articel')->group(function(){
            Route::get('/', function () {
                return view('app.home.articel.index');
            })->name('app.articel');
            
            Route::get('/detail', function () {
                return view('app.home.articel.detail');
            })->name('app.articelDetail');
        });

        Route::post('/kursi/{id}/{bioskop}/{studio}/{jam}', function () {
            $id = \Request::segment(3);
            $bioskop = \Request::segment(4);
            $studio = \Request::segment(5);
            $jam = \Request::segment(6);
            return view('app.home.film.kursi',[
                'id'=>$id,
                'bioskop'=>$bioskop,
                'studio'=>$studio,
                'jam'=>$jam,
            ]);
        })->name('app.kursi');
        Route::resource('/tiket', TiketControllers::class);
    });
    
    Route::resource('/films', FilmControllers::class);
});
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

