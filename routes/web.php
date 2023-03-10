<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
|admin dashboard Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
|admin amenities Web Routes
|--------------------------------------------------------------------------
*/

Route::resource('/amenities',App\Http\Controllers\AmenitiesController::class)->middleware('auth');

/*
|--------------------------------------------------------------------------
|admin booking history Web Routes
|--------------------------------------------------------------------------
*/

Route::resource('/booking',App\Http\Controllers\BookingHistory::class)->middleware('auth');
Route::get('/approve/booking/{id}/{status}',[App\Http\Controllers\BookingHistory::class,'approveBook'])->name('book_approve')->middleware('auth');


/*
|--------------------------------------------------------------------------
|admin room  Web Routes
|--------------------------------------------------------------------------
*/

Route::resource('/rooms',App\Http\Controllers\RoomController::class)->middleware('auth');
