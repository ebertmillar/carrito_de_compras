<?php

namespace App;

use App\ShoppingCart;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ['estado'];

    public function generateCustomID(){
        return md5("$this->id $this->update_up");

    }

    public function updateCustonID(){
        $this->estado = 'approved';
        $this->customid = $this->generateCustomID();
        $this->save();
    }

    public function approved(){
        $this->updateCustonID();
    }


    public function order(){
        return $this->hasOne('App\Order')->first();
    }
    
    public function inShoppingCart(){
        return $this->hasMany('App\InShoppingCart');

    }
    public function products(){
        return $this->belongsToMany('App\Product','in_shopping_carts');
    }

    public function ProductsQuantity(){
    	return $this->products()->count();
    }

    public function total(){
        return $this->products()->sum('precio');
    }

    public static function findOrCreateBySessionId($shopping_cart_id){

    	if($shopping_cart_id){
    		return ShoppingCart::findBySession($shopping_cart_id);

    	}else{
    		//crear un carrito de compras
    		return ShoppingCart::createWithoutSession();
    	}
	
    }

    public static function findBySession($shopping_cart_id){
		return ShoppingCart::findOrFail($shopping_cart_id);
    	}

    public static function createWithoutSession(){
		return ShoppingCart::create([
		'estado' => 'incompleto'

		]);
	}
}
