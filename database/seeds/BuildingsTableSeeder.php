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

    }
}
