<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create()->each(function($user) {
             // Generate supplies for each user

            foreach (\App\Supply::all() as $supply) {
                factory(\App\UserSupply::class)->create(['user_id' => $user->id, 'supply_id' => $supply->id]);
            }

            if (random_int(0,1) === 1) {
                $user->clan_id = \App\Clan::all()->random(1)->first()->id;
                $user->save();
            }

            $ages = \App\Age::where('order', '<=', $user->age->order)->get();
            $buildings = \App\Building::whereIn('age_id', $ages->pluck('id'))->get();
            foreach ($buildings as $building) {
                if (random_int(0,1) === 1) {
                    factory(\App\UserBuilding::class)->create(['building_id' => $building->id, 'user_id' => $user->id]);
                }
            }


        });

    }
}
