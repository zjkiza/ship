<?php

namespace App\Service\Select;

use App\Repository\Select\UserActivityRepository;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserActivityService
{
    /**
     * @var UserActivityRepository
     */
    private $userActivityRepository;

    public function __construct(UserActivityRepository $userActivityRepository)
    {
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getActivities(User $user): Collection
    {
        return $this->userActivityRepository->getActivities($user);
    }
}
