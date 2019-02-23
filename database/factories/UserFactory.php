<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $health = random_int(100,1000);
    return [
        'name' => $faker->name,
        'avatar_name' => $faker->words(2, true),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
        'level' => random_int(1,100),
        'health' => random_int(0,$health),
        'max_health' => $health,
        'strength' => random_int(1,100),
        'stamina' => random_int(1,100),
        'location_id' => \App\Location::all()->random(1)->first()->id,
        'age_id' => \App\Age::all()->random(1)->first()->id,
        'api_token' => str_random(100)
    ];
});

