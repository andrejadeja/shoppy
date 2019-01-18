<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'product_number' => str_random(5),
        'product' => $faker->word,
        'price' => $faker->randomNumber(2),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'create_user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];

});
