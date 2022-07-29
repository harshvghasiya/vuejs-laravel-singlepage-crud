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

Route::get('user','UserController@index')->name('index');
Route::get('all-user','UserController@alluser')->name('alluser');
Route::post('single-user','UserController@singleuser')->name('singleuser');
Route::get('create','UserController@create')->name('create');
Route::post('update-user/{id}','UserController@update')->name('update');
Route::post('store-user','UserController@store')->name('store');
Route::post('destroy-user','UserController@destroy')->name('destroy');
