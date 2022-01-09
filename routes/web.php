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

Route::get('/','MainController@home');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('productos', 'ProductController');

Route::get('carrito', 'ShoppingCartController@index');
Route::post('carrito', 'ShoppingCartController@pagar');

Route::get('/payments/store', 'PaymentController@store');


Route::resource('in_shopping_carts', 'InShoppingCartController',[
	'only' => ['store', 'destroy']
]);

Route::resource('compras', 'ShoppingCartController', [
	'only' => ['show']
]);

Route::resource('orders', 'OrdersController', [
	'only' => ['index', 'update']
]);


Route::get('productos/images/{filename}', function($filename){
	$path = storage_path('app/images/'.$filename);

	if(! \File::exists($path)){

		abort(404);
	}else{

		$file = \File::get($path);

		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header('Content-Type', $type);

		return $response;
	}

});