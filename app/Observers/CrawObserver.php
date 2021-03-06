<?php

namespace App\Observers;

use App\Models\Craw;
use App\Notifications\FirstLogin;

class CrawObserver
{
    public function created(Craw $craw): void
    {
        $user = $craw->user;
        $user->notify(new FirstLogin($user));
    }
}
