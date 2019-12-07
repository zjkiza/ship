<?php

use App\User;
use App\Models\Craw;
use App\Models\Rank;
use App\Models\Ship;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => User::ADMIN,
        ]);

        $rank = Rank::where('name', 'captain')->first();
        $ship = Ship::first();

        Craw::create([
            'name' => 'Jon',
            'sur_name' => 'Do',
            'user_id' => $user->id,
            'rank_id' => $rank->id,
            'ship_id' => $ship->serial_number,
        ]);
    }
}
