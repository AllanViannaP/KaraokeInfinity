<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

//Index routes
Route::get('/', ['uses' => 'HomeController@index',  'as' => 'index']);
Route::get('/home', ['uses' => 'HomeController@index',  'as' => 'index']);

//--User Routes--
Route::get('/login', ['uses' => 'Auth\LoginController@login',  'as' => 'login']);
Route::get('/sing', ['uses' => 'UserController@sing',  'as' => 'sing']);
Route::get('/settings', ['uses' => 'UserController@settings',  'as' => 'settings']);

//Login routes

Route::post('/login/verify', ['uses' => 'Auth\LoginController@verify_login',  'as' => 'login.verify']);
Route::get('/register', ['uses' => 'RegisterController@register', 'as' => 'register']);
Route::post('/registrate', ['uses' => 'RegisterController@registrate', 'as' => 'registrate']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('index');
})->name('logout');
Route::post('/verification.resend', ['uses' => 'Auth\RegisterController@verification.resend', 'as' => 'verification.resend']);
