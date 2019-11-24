<?php

namespace App\Service\Crud;

use App\Notifications\SendNewNotifications;
use App\Repository\Crud\NotificationCrudRepository;
use App\Repository\Select\UserSelectRepository;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NotificationCrudService
{
    /**
     * @var NotificationCrudRepository
     */
    private $notificationCrudRepository;
    /**
     * @var UserSelectRepository
     */
    private $userSelectRepository;

    public function __construct(
        NotificationCrudRepository $notificationCrudRepository,
        UserSelectRepository $userSelectRepository
    ) {
        $this->notificationCrudRepository = $notificationCrudRepository;
        $this->userSelectRepository = $userSelectRepository;
    }

    public function getAll(): Collection
    {
        return $this->notificationCrudRepository->getAll();
    }

    public function store(array $data): Model
    {
        $notification = $this->notificationCrudRepository->store($data);
        $this->sendNotification($notification);

        return $notification;
    }

    public function sendNotification(Model $model)
    {
        $users = $this->userSelectRepository->getUsersForNotification(
            $model->rank_id,
            $model->ship_id
        );

        /** @var User $user */
        foreach ($users as $user) {
            $user->notify(new SendNewNotifications($user));
        }
    }
}
