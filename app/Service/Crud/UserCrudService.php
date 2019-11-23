<?php

namespace App\Service\Crud;

use App\Repository\Crud\UserCrudRepository;
use Illuminate\Database\Eloquent\Collection;

class UserCrudService
{
    /**
     * @var UserCrudRepository
     */
    private $userCrudRepository;

    public function __construct(UserCrudRepository $userCrudRepository)
    {
        $this->userCrudRepository = $userCrudRepository;
    }

    public function getAll(): Collection
    {
        return $this->userCrudRepository->getAll();
    }
}
