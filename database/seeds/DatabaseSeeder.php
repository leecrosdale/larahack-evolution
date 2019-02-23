<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);

        $this->call(ClansTableSeeder::class);
        $this->call(UsersTableSeeder::class);




    }
}
