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

        //ignore events
        \App\Models\Craw::flushEventListeners();
        $this->call(CrewTableSeeder::class);

        \App\Models\Notification::flushEventListeners();
        $this->call(NotificationTableSeeder::class);
        //$this->call(ReadTableSeeder::class);
    }
}
