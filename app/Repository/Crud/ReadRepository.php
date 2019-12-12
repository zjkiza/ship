<?php

namespace App\Repository\Crud;

use App\Models\Read;

class ReadRepository
{
    public function create(array $data): Read
    {
        return Read::create($data);
    }
}
