<?php

namespace App\Service\Crud;

use App\Repository\Crud\NotificationCrudRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NotificationCrudService
{
    /**
     * @var NotificationCrudRepository
     */
    private $notificationCrudRepository;

    public function __construct(NotificationCrudRepository $notificationCrudRepository)
    {
        $this->notificationCrudRepository = $notificationCrudRepository;
    }

    public function getAll(): Collection
    {
        return $this->notificationCrudRepository->getAll();
    }

    public function store(array $data): Model
    {
        return $this->notificationCrudRepository->store($data);
    }
}
