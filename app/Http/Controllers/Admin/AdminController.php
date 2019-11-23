<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Crud\CrudService;

class AdminController extends Controller
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
        return view('admin.index', [
        ]);
    }

    public function create()
    {
        $ranks = $this->crudService->getRankCrudService()->getAll();
        $ships = $this->crudService->getShipCrudService()->getAll();

        return view('admin.create', [
            'ranks' => $ranks,
            'ships' => $ships,
        ]);
    }
}
