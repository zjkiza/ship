<?php

namespace App\Repository\Select;

use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserSelectRepository
{
    public function getUsersIndex(): Collection
    {
        return User::join('craws', 'craws.id', '=', 'users.id')
            ->join('ships', 'ships.serial_number', '=', 'craws.ship_id')
            ->join('ranks', 'ranks.id', '=', 'craws.rank_id')
            ->select('users.*', 'craws.*', 'ships.name as ship_name', 'ranks.name as rank_name')
            ->get();
    }

    public function getUsersForNotification(int $rankId, string $shipId): Collection
    {
        return User::join('craws', 'craws.user_id', '=', 'users.id')
            ->where('rank_id', $rankId)
            ->where('ship_id', $shipId)
            ->select('users.email')
            ->get();
    }
}
