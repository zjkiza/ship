<?php

namespace App\Service;

use App\Service\Crud\NotificationCrudService;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class NotificationService
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var NotificationCrudService
     */
    private $notificationCrudService;

    public function __construct(User $user, NotificationCrudService $notificationCrudService)
    {
        $this->user = $user;
        $this->notificationCrudService = $notificationCrudService;
    }

    public function indexAdmin(): Collection
    {
        return $this->notificationCrudService->getAll();
    }
}
