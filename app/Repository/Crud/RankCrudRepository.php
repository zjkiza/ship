<?php

namespace App\Repository\Crud;

use App\Models\Rank;
use Illuminate\Database\Eloquent\Collection;

class RankCrudRepository
{
    public function getAll(): Collection
    {
        return Rank::all();
    }
}
