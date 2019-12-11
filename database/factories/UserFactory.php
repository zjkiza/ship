<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, static function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
        'role' => User::ROLE[0],
    ];
});

$factory->define(\App\Models\Ship::class, static function (Faker $faker) {
    return [
        'serial_number' => $faker->unique()->uuid,
        'name' => $faker->name,
        'image' => $faker->imageUrl(),
    ];
});

$factory->define(\App\Models\Rank::class, static function (Faker $faker) {
    $rank = ['captain', 'mechanic', 'worker'];

    return [
        'name' => $faker->randomElement($rank),
    ];
});

$factory->define(\App\Models\Craw::class, static function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sur_name' => $faker->lastName,
        'user_id' => User::all()->random()->id,
        'rank_id' => \App\Models\Rank::all()->random()->id,
        'ship_id' => \App\Models\Ship::all()->random()->serial_number,
    ];
});

$factory->define(\App\Models\Notification::class, static function (Faker $faker) {
    return [
        'message' => $faker->text($maxNbChars = 200),
        'rank_id' => \App\Models\Rank::all()->random()->id,
        'ship_id' => \App\Models\Ship::all()->random()->serial_number,
    ];
});

$factory->define(\App\Models\Read::class, static function (Faker $faker) {
    return [
        'craw_id' => \App\Models\Craw::all()->random()->id,
        'notification_id' => \App\Models\Notification::all()->random()->id,
        'date_of_read' => now(),
    ];
});
