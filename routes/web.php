<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// HomeController
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@notify')->name('home.notify');

Route::get('/notifications', 'UserNotificationsController@show')->middleware('auth');
Route::post('/notifications', 'UserNotificationsController@store')->middleware('auth');

// ContactController
Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@store');
