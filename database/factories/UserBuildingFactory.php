<?php

use Faker\Generator as Faker;

$factory->define(App\UserBuilding::class, function (Faker $faker) {
    $health = random_int(100,1000);
    return [
        'level' => random_int(1,100),
        'health' => random_int(0,$health),
        'max_health' => $health,
        'next_work' => \Carbon\Carbon::now()->toDateTimeString(),
        'location_id' => \App\Location::all()->random(1)->first()->id
    ];
});
