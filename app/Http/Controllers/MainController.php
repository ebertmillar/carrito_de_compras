<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use App\ShoppingCart;
use Illuminate\Http\Request;

class MainController extends Controller{

	public function home(){

		$productos = Product::latest()->Paginate(4);

	 return view('main.home', ['productos' => $productos]);



	}




}