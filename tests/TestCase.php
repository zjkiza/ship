<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function singIn(User $user = null)
    {
        $user = $user ?: $this->getAdmin();

        $this->actingAs($user);

        return $this;
    }

    protected function getAdmin()
    {
        return User::where('email', \UsersTableSeeder::ADMIN_CREDENTIALS[0])
            ->firstOrFail();
    }
}
