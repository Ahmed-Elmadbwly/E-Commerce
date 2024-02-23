<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/search','productController@search')->name('search')->middleware('auth');
Route::get('/','categorysController@index')->name('/');
Route::get('/products/{id}','productController@index')->name('products.index')->middleware('auth');
Route::get('/single_product/{id}','productController@showProduct')->name('single-productRe')->middleware('auth');
Route::get('/card','cardController@index')->middleware('auth')->name('card')->middleware('auth');
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::post('/card','cardController@create')->name('card.create')->middleware('auth');
Route::get('/card/{id}','cardController@delete')->name('card.delete')->middleware('auth');
Route::get('/shop','productController@show')->name('shop')->middleware('auth');
Route::put('/card/quantity', 'cardController@updateQuantity')->name('update.quantity');
Route::get('/about','productController@about')->name('about');
Route::get('/search','productController@search')->name('search')->middleware('auth');


Route::get('/dashboard',function (){
    return view('admin.dashboard');
})->name('dashboard');

Route::controller('adminproductController')->prefix('admin')->group(function () {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
})->middleware('auth');

Route::controller('adminuserController')->prefix('admin/user')->group(function () {
    Route::get('', 'index')->name('users');
    Route::get('create', 'create')->name('users.create');
    Route::post('store', 'store')->name('users.store');
    Route::get('show/{id}', 'show')->name('users.show');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::put('edit/{id}', 'update')->name('users.update');
    Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
})->middleware('auth');

Route::controller('admincategoryController')->prefix('admin/category')->group(function () {
    Route::get('', 'index')->name('category');
    Route::get('create', 'create')->name('category.create');
    Route::post('store', 'store')->name('category.store');
    Route::get('show/{id}', 'show')->name('category.show');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::put('edit/{id}', 'update')->name('category.update');
    Route::delete('destroy/{id}', 'destroy')->name('category.destroy');
})->middleware('auth');
