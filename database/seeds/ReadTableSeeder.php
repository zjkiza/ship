<?php

use Illuminate\Database\Seeder;

class ReadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\Read::class, 20)->create();
    }
}
