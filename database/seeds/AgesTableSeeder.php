<?php

use Illuminate\Database\Seeder;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Age::create([
            'name' => 'Stone Age',
            'slug' => 'stone-age',
            'required_level'  => 0,
            'order' => 0,
            'is_starting_age' => true,
        ]);

        \App\Age::create([
            'name' => 'Iron Age',
            'slug' => 'iron-age',
            'required_level' => 5,
            'order' => 1
        ]);



    }
}
