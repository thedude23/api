<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 1000), //randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL)
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2,50)
    ];
});
