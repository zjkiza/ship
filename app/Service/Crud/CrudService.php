<?php

namespace App\Service\Crud;

class CrudService
{
    /**
     * @var RankCrudService
     */
    private $rankCrudService;
    /**
     * @var ShipCrudService
     */
    private $shipCrudService;

    public function __construct(
        RankCrudService $rankCrudService,
        ShipCrudService $shipCrudService
    ) {
        $this->rankCrudService = $rankCrudService;
        $this->shipCrudService = $shipCrudService;
    }

    public function getRankCrudService(): RankCrudService
    {
        return $this->rankCrudService;
    }

    public function getShipCrudService(): ShipCrudService
    {
        return $this->shipCrudService;
    }
}
