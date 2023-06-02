<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StarWarsController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', function(){ return response()->json(['error' => 'Unauthenticated.'], 401); })->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);

});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'people'
], function ($router) {
    Route::get('/', [StarWarsController::class, 'getPeople']);
    Route::get('/{id}', [StarWarsController::class, 'getPeopleById']);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'planets'
], function ($router) {
    Route::get('/', [StarWarsController::class, 'getPlanets']);
    Route::get('/{id}', [StarWarsController::class, 'getPlanetsById']);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'vehicles'
], function ($router) {
    Route::get('/', [StarWarsController::class, 'getVehicles']);
    Route::get('/{id}', [StarWarsController::class, 'getVehiclesById']);
});