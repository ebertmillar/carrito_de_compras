<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PayPal\Api\Item;

class Product extends Model
{
	public function scopeLatest($query){
		return $query->orderBy('id', 'desc');
	}

	public function paypalItems(){
	$item = new Item();
	return $item->setName($this->titulo)
				->setDescription($this->descripcion)
				->setCurrency('USD')
				->setQuantity(1)
				->setPrice($this->precio);

	}
}
