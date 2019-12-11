<?php

use Illuminate\Database\Seeder;

class CrewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\Craw::class, 10)->create();
    }
}
