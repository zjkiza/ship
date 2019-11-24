<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNotificationRequest;
use App\Service\Crud\CrudService;

class NotificationController extends Controller
{
    /**
     * @var CrudService
     */
    private $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    public function index()
    {
        $notifications = $this->crudService->getNotificationCrudService()->getAll();

        return view('notification.admin-index', [
            'notifications' => $notifications,
        ]);
    }

    public function crete()
    {
        $ranks = $this->crudService->getRankCrudService()->getAll();
        $ships = $this->crudService->getShipCrudService()->getAll();

        return view('notification.create', [
            'ranks' => $ranks,
            'ships' => $ships,
        ]);
    }

    public function store(CreateNotificationRequest $request)
    {
        $this->crudService->getNotificationCrudService()->store($request->validated());

        return redirect()->route('admin.notification');
    }
}
