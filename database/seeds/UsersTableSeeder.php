<?php

use App\User;
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

        $rank = \App\Models\Rank::where('name', 'captain')->first();
        $ship = \App\Models\Ship::first();
        \App\Models\Craw::create([
            'name' => 'Jon',
            'sur_name' => 'Do',
            'user_id' => $user->id,
            'rank_id' => $rank->id,
            'ship_id' => $ship->serial_number,
        ]);

        factory(User::class, 10)->create();
    }
}
