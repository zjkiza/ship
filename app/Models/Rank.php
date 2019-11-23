<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $table = 'ranks';

    protected $fillable = [
        'name',
    ];

    public function craws()
    {
        return $this->hasMany(Craw::class, 'rank_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'rank_id');
    }
}
