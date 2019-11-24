<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\NotificationService;

class NotificationController extends Controller
{
    /**
     * @var NotificationService
     */
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $notifications = $this->notificationService->indexAdmin();

        return view('notification.index', [
            'notifications' => $notifications,
        ]);
    }
}
