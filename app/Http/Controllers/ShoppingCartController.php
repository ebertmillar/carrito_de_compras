<?php

namespace App\Http\Controllers;

use App\Paypal;
use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shoppingcart');
    }

	public function index(Request $request){

        $shopping_cart = $request->shopping_cart;

    	$productos = $shopping_cart->products()->get();

        $total = $shopping_cart->total();


        return view('carrito_de_compras.index', ['productos' => $productos, 'total' => $total ]);

        // $paypal = new Paypal($shopping_cart);

        // $payment = $paypal->generate();

        // return $payment;

    }


    public function show($id){
        $shopping_cart = ShoppingCart::where('customid', $id)->first();
        $order = $shopping_cart->order();
        
        return view("carrito_de_compras.completed", [
            'shopping_cart' => $shopping_cart,
            'order' => $order
            ]);
    }
}
