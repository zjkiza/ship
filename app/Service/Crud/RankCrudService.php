<?php

namespace App\Service\Crud;

use App\Repository\Crud\RankCrudRepository;
use Illuminate\Database\Eloquent\Collection;

class RankCrudService
{
    /**
     * @var RankCrudRepository
     */
    private $rankCrudRepository;

    public function __construct(RankCrudRepository $rankCrudRepository)
    {
        $this->rankCrudRepository = $rankCrudRepository;
    }

    public function getAll(): Collection
    {
        return $this->rankCrudRepository->getAll();
    }
}
