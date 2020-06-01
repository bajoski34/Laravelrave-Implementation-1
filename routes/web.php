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

Route::get('/success', function() {
    return view('success');
})->name('success');

Route::get('/failed', function() {
    return view('failed');
})->name('failed');

Route::post('/pay', 'RaveController@initiate')->name('pay');
Route::get('/pay', 'RaveController@initiate')->name('pay');
Route::get('/checkout', 'RaveController@checkout')->name('checkout');
Route::post('/checkout', 'RaveController@checkout')->name('checkout');
Route::post('/webhook', 'RaveController@webhook');
Route::post('/callback', 'RaveController@callback')->name('callback');
Route::get('/onclose', 'RaveController@onclose')->name('onclose');


