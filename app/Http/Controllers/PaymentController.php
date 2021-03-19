<?php

namespace App\Http\Controllers;

use App\Order;
use App\Paypal;
use App\ShoppingCart;
use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\setItemList;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('shoppingcart');
    }	

	public function store(Request $request){
    	
    	$shopping_cart = $request->shopping_cart;

        $paypal = new Paypal($shopping_cart);

        $response = $paypal->execute($request->paymentId, $request->PayerID);

        if ($response->state == 'approved') {
            \Session::remove('shopping_cart_id');
            $order = Order::createFromPaypalResponse($response,$shopping_cart);
            $shopping_cart->approved();
        }

        return view("carrito_de_compras.completed", [
            'shopping_cart' => $shopping_cart,
            'order' => $order
            ]);

    }




    // private $shopping_cart;
    // private $apiContext;
    // // private $client_id = "AbfbBkd8Iz5ubdK1nzwwuWxDx6v_TGtU6OGOCKjYzeDcELNNgEPaoouTVa5MfcwRhkoY7Z0yQBEZBqC7";
    // // private $secret = "EErnbiPA7tB1hJH8pUzGGpdqNMguUbXnQmjwfwZQ2EbFE0SAr8URlVF2WFY1KnMUmFvQrkvS79hIOTDh";


    // public function __construct($shopping_cart){

    // 	$payPalConfig = Config::get('paypal');

    //     $this->apiContext = new ApiContext(
    //         new OAuthTokenCredential(
    //             $payPalConfig['client_id'],
    //             $payPalConfig['secret']
    //         )
    //     );

    //     $this->apiContext->setConfig($payPalConfig['settings']);
    // 	$this->shopping_cart = $shopping_cart;

    // }

    // public function generate(){

    //     $payment = new Payment();
    //     $payment->setIntent('sale')
    //         ->setPayer($this->payer())
    //         ->setTransactions(array($this->transaction()))
    //         ->setRedirectUrls($this->redirectUrls());

    //     try {
    //         $payment->create($this->apiContext);
    //         return redirect()->away($payment->getApprovalLink());
    //     } catch (PayPalConnectionException $ex) {
    //         echo $ex->getData();
    //         exit(1);
    //     }

    // }

    // public function payer(){
    // 	$payer = new Payer();
    // 	return $payer->setPaymentMethod('paypal');
    // }

    // public function amount(){
    // 	$amount = new Amount();
    //     return $amount->setTotal($this->shopping_cart->total())
    //     		->setCurrency('USD');
    // }

    // public function items(){

    // 	$itemsList = new ItemList();

    // 	$items = [];

    // 	$productos = $this->shopping_cart->products()->get();

    // 	foreach ($productos as $producto) {
    // 		array_push($items, $producto->paypalItems());
    // 	}

    // 	return $itemsList->setItems($items);
    // }

    // public function transaction(){
    // 	$transaction = new Transaction();
    //     return $transaction->setAmount($this->amount())
    //     					->setItemList($this->items())
    //     					->setDescription('tu compra fue exitosa')
				// 	    	->setInvoiceNumber(uniqid());
    
    // }

    // public function redirectUrls(){
    // 	$baseURL = url('url');
    // 	$redirectUrls = new RedirectUrls();
    // 	return $redirectUrls->setReturnUrl("$baseURL/payments/store")
    // 						->setCancelUrl("$baseURL/carrito");
    // }

    // public function store(Request $request){
    // 	$shopping_cart_id = \Session::get('shopping_cart_id');

    //     $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);

    //     $paypal = new 

    // }

    

}
