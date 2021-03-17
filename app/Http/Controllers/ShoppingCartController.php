<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
	public function index(){

    	$shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);

        // $paypal = new Paypal($shopping_cart);
        // $payment = $paypal->generate();

        // return $payment;

        $productos = $shopping_cart->products()->get();

        $total = $shopping_cart->total();


        return view('carrito_de_compras.index', ['productos' => $productos, 'total' => $total ]);
    }
}
