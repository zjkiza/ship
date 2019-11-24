<?php

namespace App\Service\Select;

use App\Repository\Select\UserSelectRepository;
use Illuminate\Database\Eloquent\Collection;

class UserSelectService
{
    private $userSelectRepository;

    public function __construct(UserSelectRepository $userSelectRepository)
    {
        $this->userSelectRepository = $userSelectRepository;
    }

    public function getAllUserSelect(): Collection
    {
        return $this->userSelectRepository->getUsersIndex();
    }

    public function getUsersForNotification(int $rankId, string $shipId): Collection
    {
        return $this->userSelectRepository->getUsersForNotification($rankId, $shipId);
    }
}
