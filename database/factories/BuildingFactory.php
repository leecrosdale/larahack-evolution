<?php

use Faker\Generator as Faker;

$factory->define(App\Building::class, function (Faker $faker) {
    $name = $faker->words(2,true);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'age_id' => \App\Age::all()->random(1)->first()->id,
        'type' => $faker->randomElement([\App\Enums\BuildingType::WOOD,\App\Enums\BuildingType::MINE,\App\Enums\BuildingType::HOUSE,\App\Enums\BuildingType::FARM])
    ];
});
