<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'content' => $faker->company,
        'audi_id' => 1,
        'type' => rand(1,2),
    ];
});
