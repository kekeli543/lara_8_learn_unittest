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

Route::get('/posts','App\Http\Controllers\PostController@index');
Route::post('/posts/store','App\Http\Controllers\PostController@store');
Route::match(['get','post'],'/posts/{id}','App\Http\Controllers\PostController@show');
