<?php

use Faker\Generator as Faker;

$factory->define(App\UserSupply::class, function (Faker $faker) {
    return [
        'amount' => random_int(10,10000)
    ];
});
