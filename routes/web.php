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
   return view('about',['hoom'=>$hoom]);
});
Route::post('custom/add','CustomController@Add');
Route::get('custom/add/show','CustomController@AddShow');