<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'products'

], function ($router) {

    Route::get('allproduct', 'productController@allproduct');
    Route::post('store', 'productController@store');
    Route::get('show/{id}', 'productController@show');
    Route::put('update/{id}', 'productController@update');
    Route::delete('delete/{id}','productController@destroy');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'category'

], function ($router) {

    Route::get('allcategory', 'categoryController@allcategory');
    Route::post('store', 'categoryController@store');
    Route::get('show/{id}', 'categoryController@show');
    Route::put('update/{id}', 'categoryController@update');
    Route::delete('delete/{id}','categoryController@destroy');
});
