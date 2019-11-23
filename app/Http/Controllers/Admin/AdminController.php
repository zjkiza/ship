<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreteUserRequest;
use App\Service\Crud\CrudService;
use App\Service\Crud\UserCrawStoreService;
use App\Service\Select\UserSelectService;

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

    public function index(UserSelectService $userSelectService)
    {
        $users = $userSelectService->getAllUserSelect();

        return view('admin.index', [
            'users' => $users,
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

    public function store(
        CreteUserRequest $request,
        UserCrawStoreService $userCrawStoreService
    ) {
        $userCrawStoreService->store($request->validated());

        return redirect()->route('admin.index');
    }
}
