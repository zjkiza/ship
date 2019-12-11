<?php

use App\Models\Ship;
use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Ship::class, 5)->create();
    }
}
