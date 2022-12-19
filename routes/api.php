<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\DashboardController;

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


/*
|--------------------------------------------------------------------------
| Login and dashboard route
|--------------------------------------------------------------------------
*/
Route::post('/login',[AuthController::class,'login']);
Route::get('/access',[DashboardController::class,'dashboard'])->middleware('auth:sanctum');


/*
|--------------------------------------------------------------------------
| Room list route
|--------------------------------------------------------------------------
*/

Route::get('/rooms',[DashboardController::class,'roomList']);


/*
|--------------------------------------------------------------------------
| Room book route
|--------------------------------------------------------------------------
*/

Route::post('/book',[DashboardController::class,'roomBook'])->middleware('auth:sanctum');