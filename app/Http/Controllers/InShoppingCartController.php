<?php

namespace App\Http\Controllers;

use App\InShoppingCart;
use App\ShoppingCart;
use Illuminate\Http\Request;

class InShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shoppingcart');
    }
    
    public function store(Request $request)
    {
     	 $shopping_cart = $request->shopping_cart;

     	 $carrito = InShoppingCart::create([

     	 	'product_id' => $request->producto_id,
     	 	'shopping_cart_id' => $shopping_cart->id

     	 ]);

       	 if(false){
       	 	return redirect('/carrito');

       	 }else{
       	 	return back();
       	 }



    }

    
    public function destroy($id)
    {
        //
    }
}
