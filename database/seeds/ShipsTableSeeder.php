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
        $ships = [
            [
                'serial_number' => 'a1b2c3d4',
                'name' => 'Ship a1b2c3d4',
                'image' => 'ship1.jpg',
            ],
            [
                'serial_number' => 'e1f2g3h4',
                'name' => 'Ship e1f2g3h4',
                'image' => 'ship2.jpg',
            ],
            [
                'serial_number' => 'q1w2e3r4',
                'name' => 'Ship q1w2e3r4',
                'image' => 'ship3.jpg',
            ],
        ];

        foreach ($ships as $ship) {
            Ship::create($ship);
        }
    }
}
