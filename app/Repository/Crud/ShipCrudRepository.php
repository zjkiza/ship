<?php

namespace App\Repository\Crud;

use App\Models\Ship;
use Illuminate\Database\Eloquent\Collection;

class ShipCrudRepository
{
    public function getAll(): Collection
    {
        return Ship::all();
    }
}
