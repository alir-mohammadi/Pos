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
});
Route::prefix('store')->group(function ()
{
   Route::put('','StoreController@AddToJar');
   Route::put('','StoreController@EditJar');
   Route::delete('','StoreController@DeleteJar');
   Route::put('','StoreController@ReturnWood');
   Route::put('','StoreController@AddCustomer');
   Route::put('','StoreController@Pay');
   Route::put('','StoreController@MakeBill');
   Route::put('','StoreController@PrintBill');
   Route::put('','StoreController@CustomerScreen');
   Route::get('','StoreController@ShowPage');
   Route::get('/search','StoreController@Search');

});
Route ::prefix('warehouse')->group(function()
{
  Route::put('','WareHouseController@AddGoofs');
});