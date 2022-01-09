<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'user_id' => $faker->randomDigit(),
    	'titulo' => $faker->sentence,
    	'descripcion' => $faker->text,
        'precio' => $faker->randomFloat(2, 1, 100 ),        
    ];
});
