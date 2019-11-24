<?php

namespace App\Repository\Crud;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

class NotificationCrudRepository
{
    public function getAll(): Collection
    {
        return Notification::all();
    }
}
