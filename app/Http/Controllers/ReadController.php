<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReadRequest;
use App\Service\Crud\ReadService;

class ReadController extends Controller
{
    /**
     * @var ReadService
     */
    private $readService;

    public function __construct(ReadService $readService)
    {
        $this->readService = $readService;
    }

    public function checkRead(ReadRequest $request)
    {
        $this->readService->create($request->validated());

        return redirect()->route('notification.read');
    }
}
