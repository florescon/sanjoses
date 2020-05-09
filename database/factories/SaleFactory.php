<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use App\Models\Auth\User;
use App\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'user_id' => rand(10, 1000),
        'ticket_text' => $faker->realText(rand(10,20)), 
        'payment_method_id' => rand(1, 2), 
        'audi_id' => 1
    ];
});
