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



        factory(\App\Building::class, 15)->create()->each(function ($building) {

            $types = \App\Supply::inRandomOrder()->limit(rand(1,4))->get();

            foreach ($types as $type) {
                factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);
            }

        });


    }
}
