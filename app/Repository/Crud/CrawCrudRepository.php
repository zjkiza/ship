<?php

namespace App\Repository\Crud;

use App\Models\Craw;
use Illuminate\Database\Eloquent\Model;

class CrawCrudRepository
{
    public function store(array $data): Model
    {
        return Craw::create($data);
    }
}
