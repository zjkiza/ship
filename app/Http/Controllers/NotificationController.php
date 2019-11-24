<?php

namespace App\Http\Controllers;

use App\Service\Select\NotificationSelectService;

class NotificationController extends Controller
{
    /**
     * @var NotificationSelectService
     */
    private $notificationSelectService;

    public function __construct(NotificationSelectService $notificationSelectService)
    {
        $this->notificationSelectService = $notificationSelectService;
    }

    public function notRead()
    {
        $notifications = $this->notificationSelectService
            ->getNotRead(
                auth()->user()->craw->rank_id,
                auth()->user()->craw->ship_id,
                auth()->user()->craw->id
            );

        return view('notification.index', [
            'notifications' => $notifications,
        ]);
    }

    public function read()
    {
        $notifications = $this->notificationSelectService
            ->getRead(
                auth()->user()->craw->rank_id,
                auth()->user()->craw->ship_id,
                auth()->user()->craw->id
            );

        return view('notification.index', [
            'notifications' => $notifications,
        ]);
    }
}
