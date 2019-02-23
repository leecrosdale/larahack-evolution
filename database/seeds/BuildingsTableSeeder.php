<?php

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stone_age = \App\Age::where('slug', 'stone-age')->first();

        \App\Building::create([

            'name' => 'Hut',
            'slug' => 'hut',
            'type' => 'house',
            'age_id' => $stone_age->id

        ]);

        $iron_age = \App\Age::where('slug', 'iron-age')->first();

        \App\Building::create([

            'name' => 'Stone Mine',
            'slug' => 'stone-mine',
            'type' => 'mine',
            'age_id' => $iron_age->id

        ]);


    }
}
