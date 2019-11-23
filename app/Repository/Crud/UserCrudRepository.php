<?php

namespace App\Repository\Crud;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserCrudRepository
{
    public function getAll(): Collection
    {
        return User::all();
    }

    public function getSingle(int $id): Model
    {
        return User::findOrFail($id);
    }

    public function store(array $data): Model
    {
        return User::create($data);
    }
}
