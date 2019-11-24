<?php

namespace App\Jobs;

use App\Service\Crud\NotificationCrudService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNewNotifications implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    /**
     * @var int
     */
    private $rankId;
    /**
     * @var string
     */
    private $shipId;

    public function __construct(int $rankId, string $shipId)
    {
        $this->rankId = $rankId;
        $this->shipId = $shipId;
    }

    public function handle(NotificationCrudService $service): void
    {
        $service->sendNotification($this->rankId, $this->shipId);
    }
}
