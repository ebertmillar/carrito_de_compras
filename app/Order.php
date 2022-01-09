<?php

namespace App;

use App\Mail\OrderCreated;
use App\Mail\OrderUpdate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\query;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
	protected $fillable = ['line1','line2','city','postal_code','country_code','state',
							'recipient_name','email','status','guide_number','total',
							'shopping_cart_id'];

    public function sendMail(){
        Mail::to('ebertmillar@gmail.com')->send(new OrderCreated($this));
    }

    public function sendUpdateMail(){
        Mail::to('ebertmillar@gmail.com')->send(new OrderUpdate($this));

    }

    public function shoppingCartCustomID(){
        return $this->shopping_cart->customid;
    }

    public function scopeLatest($query){
        return $query->orderID()->monthly();
    }

    public function scopeOrderID($query){
        return $query->orderBy('id', 'desc');
    }

    public function scopeMonthly($query){
        return $query->whereMonth('created_at', '=', date('m'));
    }

    public function address(){
        return "$this->line1 $this->line2";
    }

    public function shopping_cart(){
        return $this->belongsTo('App\ShoppingCart');
    }

    public static function totalMonth(){
        return Order::monthly()->sum('total');
    }

    public static function totalMonthCount(){
        return Order::monthly()->count();
    }

    public static function createFromPaypalResponse($response,$shopping_cart){

    	$payer = $response->payer;

    	// $orderData = $payer->payer_info->shipping_address->toArray();
		$orderData = (array) $payer->payer_info->shipping_address;
		$orderData = $orderData[key($orderData)];

    	$orderData['email'] = $payer->payer_info->email;
    	$orderData['total'] = $shopping_cart->total();
    	$orderData['shopping_cart_id'] = $shopping_cart->id;

    	return Order::create($orderData);



    }
}
