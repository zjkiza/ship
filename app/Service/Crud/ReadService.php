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
        return $this
            ->readRepository
            ->create(
                $this->addDate($data)
            );
    }

    public function addDate(array $data): array
    {
        $date = ['date_of_read' => now()];

        return array_merge($data, $date);
    }
}
