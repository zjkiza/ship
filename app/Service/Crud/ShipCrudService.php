<?php

namespace App\Service\Crud;

use App\Repository\Crud\ShipCrudRepository;
use Illuminate\Database\Eloquent\Collection;

class ShipCrudService
{
    /**
     * @var ShipCrudRepository
     */
    private $shipCrudRepository;

    public function __construct(ShipCrudRepository $shipCrudRepository)
    {
        $this->shipCrudRepository = $shipCrudRepository;
    }

    public function getAll(): Collection
    {
        return $this->shipCrudRepository->getAll();
    }
}
