<?php

namespace App\Repository\Crud;

use App\Models\Read;

class ReadRepository
{
    public function create(array $data): Read
    {
        return Read::create(
            $this->addDate($data)
        );
    }

    public function addDate(array $data): array
    {
        $date = ['date_of_read' => now()];

        return array_merge($data, $date);
    }
}
