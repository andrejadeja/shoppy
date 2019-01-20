<?php

use Faker\Generator as Faker;

$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'name' => str_random(5),
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'role_id' => 1,
 
    ];
});
