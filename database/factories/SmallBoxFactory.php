<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SmallBox;
use Faker\Generator as Faker;

$factory->define(SmallBox::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'amount' => rand(5, 100),
		'type' => rand(1,2),        
    ];
});
