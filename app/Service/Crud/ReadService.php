<?php

namespace App\Service\Crud;

use App\Models\Read;
use App\Repository\Crud\ReadRepository;

class ReadService
{
    /**
     * @var ReadRepository
     */
    private $readRepository;

    public function __construct(ReadRepository $readRepository)
    {
        $this->readRepository = $readRepository;
    }

    public function create(array $data): Read
    {
        return $this->readRepository->create($data);
    }
}
