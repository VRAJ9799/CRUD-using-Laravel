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
    return view('create');
});
Route::match(['get','post'],'/create','UserController@create');
Route::get('/index','UserController@index');
Route::get('/delete/{id}','UserController@deleteUser');
Route::match(['get','post'],'/edit/{id}','UserController@edit');
