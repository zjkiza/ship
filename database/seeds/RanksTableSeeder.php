<?php

use App\Models\Rank;
use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ranks = ['captain', 'mechanic', 'worker'];

        foreach ($ranks as $rank) {
            Rank::create([
                'name' => $rank,
            ]);
        }
    }
}
