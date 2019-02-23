<?php

use Faker\Generator as Faker;

$factory->define(App\Clan::class, function (Faker $faker) {
    $name = $faker->words(2,true);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'active' => random_int(0,1),
        'public' => random_int(0,1),
        'join_code' => str_random(6)
    ];
});
