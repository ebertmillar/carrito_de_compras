<?php

namespace App\Providers;

use App\ShoppingCart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            
        $shopping_cart_id = \Session::get('shopping_cart_id');

        $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);

        \Session::put("shopping_cart_id", $shopping_cart->id);

        $view->with('productsQuantity', $shopping_cart->productsQuantity());

        });
    }
}
