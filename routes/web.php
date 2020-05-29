<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::post('/pay', 'RaveController@initiate');
Route::get('/pay', 'RaveController@initiate');
Route::get('/checkout', 'RaveController@checkout')->name('checkout');
Route::post('/checkout/:id', 'RaveController@checkout')->name('checkout');

