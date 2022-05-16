<?php

use App\Infrastructure\Controllers\GetCoinController;
use App\Infrastructure\Controllers\BuyCoinController;
use App\Infrastructure\Controllers\IsEarlyAdopterUserController;
use App\Infrastructure\Controllers\StatusController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*Route::get(
    '/status',
    StatusController::class
);*/

Route::get('coin/status/{coin_id}', GetCoinController::class);
Route::post('coin/buy', BuyCoinController::class);


