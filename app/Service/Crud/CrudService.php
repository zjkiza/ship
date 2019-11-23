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
    /**
     * @var UserCrudService
     */
    private $userCrudService;

    public function __construct(
        RankCrudService $rankCrudService,
        ShipCrudService $shipCrudService,
        UserCrudService $userCrudService
    ) {
        $this->rankCrudService = $rankCrudService;
        $this->shipCrudService = $shipCrudService;
        $this->userCrudService = $userCrudService;
    }

    public function getUserCrudService(): UserCrudService
    {
        return $this->userCrudService;
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
