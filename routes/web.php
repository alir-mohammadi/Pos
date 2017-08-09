<?php

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
   $hoom=['welcome','to','laravel'];
  return view('home');
});
Route::post('customer/add','CustomController@Add');
Route::get('customer','CustomController@AddShow');