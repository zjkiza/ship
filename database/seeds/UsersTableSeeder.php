<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    const ADMIN_CREDENTIALS = ['admin@gmail.com', 'admin'];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => static::ADMIN_CREDENTIALS[0],
            'password' => bcrypt(static::ADMIN_CREDENTIALS[1]),
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
