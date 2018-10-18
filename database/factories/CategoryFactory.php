<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(rand(2, 10), true),
        'slug' => $faker->sentence(),
    ];
});
