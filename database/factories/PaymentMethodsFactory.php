<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameMale,
    ];
});
