<?php

namespace App\Repository\Crud;

use App\Models\Craw;

class CrawCrudRepository
{
    public function store(array $data)
    {
        return Craw::create($data);
    }
}
