<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Material;
use Ramsey\Uuid\Uuid;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'part_number' => Uuid::uuid4()->toString(),
        'name' => $faker->word,
        'description' => $faker->jobTitle,
        'acquisition_cost' => rand(100, 500),
        'price' => rand(100, 500),
        'stock' => rand(5, 100),
        'unit_id' => rand(1, 10),
        'color_id' => rand(1, 100),
        'size_id' => rand(1, 40),
    ];
});
