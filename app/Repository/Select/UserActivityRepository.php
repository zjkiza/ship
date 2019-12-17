<?php

namespace App\Repository\Select;

use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserActivityRepository
{
    public function getActivities(User $user): Collection
    {
        return $user->activity()->with('subject')->get();
    }
}
