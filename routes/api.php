<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('user','UserController@alluser')->name('alluser');
Route::post('update-user/{id}','UserController@update')->name('update');
Route::post('store-user','UserController@store')->name('store');
Route::post('destroy-user/{id}','UserController@destroy')->name('destroy');
