<?php

namespace App\Repository\Crud;

use App\Models\Ship;

class ShipCrudRepository
{
    public function getAll()
    {
        return Ship::all();
    }
}
