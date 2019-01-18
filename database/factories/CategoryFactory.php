<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'create_user_id' => function () {
            return factory(App\User::class)->create()->id;
        }

    ];
});
