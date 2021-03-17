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

Route::get('/home','MainController@home');

Auth::routes();

Route::resource('productos', 'ProductController');

Route::get('carrito', 'ShoppingCartController@index');

Route::resource('in_shopping_carts', 'InShoppingCartController',[
	'only' => ['store', 'destroy']
]);
