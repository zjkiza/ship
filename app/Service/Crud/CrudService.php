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
    /**
     * @var NotificationCrudService
     */
    private $notificationCrudService;

    public function __construct(
        RankCrudService $rankCrudService,
        ShipCrudService $shipCrudService,
        UserCrudService $userCrudService,
        NotificationCrudService $notificationCrudService
    ) {
        $this->rankCrudService = $rankCrudService;
        $this->shipCrudService = $shipCrudService;
        $this->userCrudService = $userCrudService;
        $this->notificationCrudService = $notificationCrudService;
    }

    /**
     * @return NotificationCrudService
     */
    public function getNotificationCrudService(): NotificationCrudService
    {
        return $this->notificationCrudService;
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
