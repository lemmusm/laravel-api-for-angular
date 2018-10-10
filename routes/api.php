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
    return $request->user();
});

// Create a new data
Route::post('usuario', 'usuarioController@store');
// Get data list
Route::get('usuarios', 'usuarioController@index');
// Get specific data
Route::get('usuario/{id}', 'usuarioController@show');
// Update data
Route::put('usuario/{id}', 'usuarioController@update');
// delete data
Route::delete('usuario/{id}', 'usuarioController@destroy');
