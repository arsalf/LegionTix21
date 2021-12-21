<?php

use App\Http\Controllers\AppControllers;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArtikelControllers;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\DompetControllers;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\FilmControllers;
use App\Http\Controllers\HargaTiketController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\KursiControllers;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TiketControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TypeStudioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {


        Route::get('/dashboard', function () {
            return view('app.admin.dashboard');
        })->name('dashboard.admin');

        Route::resource('/profile', ProfileController::class);
        Route::resource('/setting/role', RoleController::class);
        Route::resource('/setting/location', LocationController::class);
        Route::resource('/setting/city', CityController::class);
        Route::resource('/setting/province', ProvinceController::class);
        Route::resource('/profile', ProfileController::class);     
        Route::prefix('/setting')->group(function(){
            Route::resource('/account', AccountController::class);
            Route::resource('/role', RoleController::class);
            Route::resource('/region', ProvinceController::class);          
            Route::resource('/city', CityController::class);
            Route::resource('/district', KecamatanController::class);
            Route::resource('/village', KelurahanController::class);
            Route::get('/film/search', [FilmController::class, 'searchData'])->name('film.search');
            Route::resource('/film', FilmController::class);
            Route::resource('/bioskop', BioskopController::class);
            Route::resource('/studio', StudioController::class);
            Route::resource('/typestudio', TypeStudioController::class);                
            Route::resource('/kursi', KursiController::class);   
            Route::resource('/showtime', ShowTimeController::class);
            Route::resource('/day', DayController::class);
            Route::resource('/hargatiket', HargaTiketController::class); 
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
    Route::get('/bayarTopUp', function () {
        return view('app.home.bayarTopUp');
    })->name('app.bayarTopUp');
    Route::resource('/home', AppControllers::class);
    Route::middleware(['auth', 'IsCostumer'])->group(function(){
        
        Route::resource('/dompet', DompetControllers::class);
        Route::resource('/tiket', TiketControllers::class);
        Route::resource('/kursis', KursiControllers::class);    
        Route::resource('/artikel', ArtikelControllers::class);
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

Route::middleware(['auth', 'isEmploy'])->group(function () {
    Route::prefix('emp')->group(function () {
        Route::get('/dashboard', function () {
            return view('app.employee.index');
        });
        Route::get('/seatSelection', function () {
            return view('app.employee.seatSelection');
        });
    });
});

Route::get('/forbidden', function () {
    return view('forbidden');
});
