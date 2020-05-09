<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    static $order = 1;   
    return [
        'name' => $faker->word,
        'code' => $order++."azul",
		'quantity' => rand(1, 50),
		'price' => rand(10, 100),
		'type' => 1,
		'status' => 1,        
    ];
});
