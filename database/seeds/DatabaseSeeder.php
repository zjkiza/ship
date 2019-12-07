<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(ShipsTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
