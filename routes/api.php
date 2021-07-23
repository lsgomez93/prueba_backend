<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);

//se añade el middleware para validar que el usuario este autenticado

Route::group(['middleware' => ['auth:sanctum']], function () {
    //rutas protegidas 
    Route::post('/vehicles', [VehicleController::class, 'store']);
});


Route::get('/custumers', [UserController::class, 'custumersByCity']);
Route::get('/brands', [VehicleController::class, 'vehiclesByBrand']);
Route::apiResource('users', UserController::class);
Route::apiResource('vehicles', VehicleController::class)->except('store');
Route::apiResource('cities', CityController::class);
