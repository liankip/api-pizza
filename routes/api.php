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

/* Auth And Order */
Route::group(['middleware' => ['api']], function() {

    Route::post('/auth/signup', 'AuthController@signup');
    Route::post('/auth/signin', 'AuthController@signin');

    Route::group(['middleware' => ['jwt.auth']], function() {
        Route::get('/receipts/{id}', 'OrdersController@show');
    });

});

/* Pizza */
Route::get('/pizzas', 'PizzasController@index');
 
Route::put('/pizzas/{pizza}','PizzasController@update');
 
Route::delete('/pizzas/{pizza}', 'PizzasController@delete');

/* Auth And Guest Orders */
Route::post('/orders', 'OrdersController@store');

Route::get('/lastinsert', 'OrdersController@lastinsert');