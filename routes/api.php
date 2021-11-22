<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
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

Route::get('provinsi/{id}', [ProvinceController::class, 'getProvinsi']);
Route::get('provinsi', [ProvinceController::class, 'getAllProvinsi']);
Route::get('city/{id}', [CityController::class, 'getCity']);
Route::get('city', [CityController::class, 'getAllCity']);
