<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    $name = $faker->city;
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
