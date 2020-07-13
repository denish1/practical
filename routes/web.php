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
    return view('login');
});

Route::get('user_reg','UserController@user_reg');
Route::post('register','UserController@register');

Route::get('login','UserController@login');
Route::post('userlogin','UserController@user_login');
Route::get('dashboard','UserController@dashboard');

Route::get('add_blog','UserController@add_blog');
Route::post('ins_blog','UserController@ins_blog');
Route::get('FilterDate','UserController@FilterDate');