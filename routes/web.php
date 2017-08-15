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

Route::prefix('/')->group(function ()
{
    Route::get('','HomeController@ShowPage');
});
Route::prefix('customer')->group(function ()
{
   Route::put('','CustomController@Add');
   Route::get('','CustomController@ShowPage');
   Route::post('/search','CustomController@Search');

});
Route::get('/test',function ()
{
    return view('test');
});
Route::prefix('store')->group(function ()
{
   Route::put('','StoreController@Add');
   Route::get('','StoreController@ShowPage');
   Route::post('/search','StoreController@Search');
   Route::post('/print','StoreController@MakeBill');
});