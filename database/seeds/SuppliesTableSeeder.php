<?php

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Supply::create([
            'name' => 'Gold',
            'slug' => 'gold'
        ]);

        \App\Supply::create([
            'name' => 'Wood',
            'slug' => 'wood'
        ]);

        \App\Supply::create([
            'name' => 'Stone',
            'slug' => 'stone'
        ]);

        \App\Supply::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);


    }
}
