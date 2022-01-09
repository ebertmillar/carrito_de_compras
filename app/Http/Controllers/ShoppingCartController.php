<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Order;
use App\Paypal;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


    }

    public function pagar(Request $request){
        $shopping_cart = $request->shopping_cart;

        $paypal = new Paypal($shopping_cart);
        $payment = $paypal->generate();
        return $payment;
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
