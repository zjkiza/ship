<?php

namespace App\Service\Crud;

use App\Repository\Crud\CrawCrudRepository;
use App\Repository\Crud\UserCrudRepository;
use Illuminate\Database\Eloquent\Model;

class UserCrawStoreService
{
    /**
     * @var UserCrudRepository
     */
    private $userCrudRepository;
    /**
     * @var CrawCrudRepository
     */
    private $crawCrudRepository;

    public function __construct(
        UserCrudRepository $userCrudRepository,
        CrawCrudRepository $crawCrudRepository
    ) {
        $this->userCrudRepository = $userCrudRepository;
        $this->crawCrudRepository = $crawCrudRepository;
    }

    public function store(array $inputData): void
    {
        $user = $this->userCrudRepository->store($this->getUserData($inputData));
        $this->crawCrudRepository->store($this->getCrawData($inputData, $user));
    }

    private function getUserData(array $inputData): array
    {
        return [
            'name' => $inputData['name'],
            'email' => $inputData['email'],
            'password' => bcrypt($inputData['password']),
            'role' => $inputData['role'],
        ];
    }

    private function getCrawData(array $inputData, Model $model): array
    {
        return [
            'name' => $inputData['craw_name'],
            'sur_name' => $inputData['sur_name'],
            'user_id' => $model->id,
            'rank_id' => $inputData['rank_id'],
            'ship_id' => $inputData['ship_id'],
        ];
    }
}
