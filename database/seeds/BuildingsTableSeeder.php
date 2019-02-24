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

        $building = new \App\Building();
        $building->name = 'Farm';
        $building->slug = 'farm';
        $building->type = \App\Enums\BuildingType::FARM;
        $building->age_id = 1;
        $building->save();


        $type = \App\Supply::where('slug', \App\Enums\SupplyType::WOOD)->first();
        factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);

        $type = \App\Supply::where('slug', \App\Enums\SupplyType::FOOD)->first();
        factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);


        $building = new \App\Building();
        $building->name = 'Mine';
        $building->slug = 'mine';
        $building->age_id = 1;
        $building->type = \App\Enums\BuildingType::MINE;
        $building->save();

        $type = \App\Supply::where('slug', \App\Enums\SupplyType::STONE)->first();
        factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);

        $type = \App\Supply::where('slug', \App\Enums\SupplyType::WOOD)->first();
        factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);


        $building = new \App\Building();
        $building->name = 'Forest';
        $building->slug = 'forest';
        $building->age_id = 1;
        $building->type = \App\Enums\BuildingType::WOOD;
        $building->save();

        $type = \App\Supply::where('slug', \App\Enums\SupplyType::FOOD)->first();
        factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);


//        factory(\App\Building::class, 15)->create()->each(function ($building) {
//
//            $types = \App\Supply::inRandomOrder()->limit(rand(1,4))->get();
//
//            foreach ($types as $type) {
//                factory(\App\BuildingRequirement::class)->create(['building_id' => $building->id, 'supply_id' => $type->id]);
//            }
//
//        });


    }
}
