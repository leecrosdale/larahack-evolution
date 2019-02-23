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
            'level'  => 0
        ]);

        \App\Age::create([
            'name' => 'Iron Age',
            'slug' => 'iron-age',
            'level' => 5
        ]);



    }
}
