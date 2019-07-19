<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    // 
    $request->headers->set('Accept', 'application/json');
    // 



    return $request->user();
});


Route::get('/token', "TokenController@index");

Route::middleware('auth:api')->post('/item', "ItemController@create");
Route::middleware('auth:api')->delete('/item', "ItemController@destroy");
Route::middleware('auth:api')->put('/item', "ItemController@update");
Route::middleware('auth:api')->get('/items', "ItemController@index");
