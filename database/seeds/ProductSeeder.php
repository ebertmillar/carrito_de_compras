<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

        	'user_id' => '3' ,
    		'titulo' => 'pera',
    		'descripcion'=> 'dulce',
        	'precio' => 4

        ]);

        factory(Product::class, 8)->create();
    }
}
