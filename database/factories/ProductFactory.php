<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(App\Category::class),
        'product_number' => str_random(5),
        'product' => $faker->word,
        'description' => $faker->paragraph,
        'price' => $faker->randomNumber(2),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'create_user_id' => factory(App\User::class)
    ];

});
