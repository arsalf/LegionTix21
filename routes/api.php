<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ShowTimeController;
use App\Http\Controllers\TiketControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('typekursi', [KursiController::class, 'getAllType']);
Route::get('provinsi/{id}', [ProvinceController::class, 'getProvinsi']);
Route::get('provinsi', [ProvinceController::class, 'getAllProvinsi']);
Route::get('city/{id}', [CityController::class, 'getCity']);
Route::get('kecamatan/{id}', [KecamatanController::class, 'getKecamatan']);
Route::get('kelurahan/{id}', [KelurahanController::class, 'getKelurahan']);
Route::get('studio/{id}', [StudioController::class, 'getStudio']);
Route::get('showtime/{id}', [ShowTimeController::class, 'getJamTayang']);
Route::post('booking', [TiketControllers::class, 'serveTiket']);
