<?php

namespace App\Service\Crud;

use App\Models\Notification;
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

        dispatch(new \App\Jobs\SendNewNotifications(
            $notification->rank_id,
            $notification->ship_id
        ));

        return $notification;
    }

    public function sendNotification(int $rankId, string $shipId): void
    {
        $users = $this->userSelectRepository->getUsersForNotification(
            $rankId,
            $shipId
        );

        /** @var User $user */
        foreach ($users as $user) {
            $user->notify(new SendNewNotifications($user));
        }
    }

    public function destroy(Notification $notification): void
    {
        $this->notificationCrudRepository->destroy($notification);
    }
}
