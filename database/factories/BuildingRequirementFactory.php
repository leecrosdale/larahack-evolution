<?php

use Faker\Generator as Faker;

$factory->define(App\BuildingRequirement::class, function (Faker $faker) {
    return [
        'multiplier' => random_int(1,10),
        'amount' => random_int(1,10)
    ];
});
