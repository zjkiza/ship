<?php

namespace App\Service\Select;

use App\Repository\Select\NotificationSelectRepository;
use Illuminate\Database\Eloquent\Collection;

class NotificationSelectService
{
    /**
     * @var NotificationSelectRepository
     */
    private $notificationSelectRepository;

    public function __construct(NotificationSelectRepository $notificationSelectRepository)
    {
        $this->notificationSelectRepository = $notificationSelectRepository;
    }

    public function getRead(int $rankId, string $shipId, int $crawId): Collection
    {
        return $this->notificationSelectRepository->getRead($rankId, $shipId, $crawId);
    }

    public function getNotRead(int $rankId, string $shipId, int $crawId): Collection
    {
        return $this->notificationSelectRepository->getNotRead($rankId, $shipId, $crawId);
    }
}
