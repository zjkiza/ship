<?php

namespace App\Repository\Crud;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NotificationCrudRepository
{
    public function getAll(): Collection
    {
        return Notification::all();
    }

    public function store(array $data): Model
    {
        return Notification::create($data);
    }

    /**
     * @param Notification $notification
     *
     * @throws \Exception
     */
    public function destroy(Notification $notification): void
    {
        $notification->delete();
    }
}
