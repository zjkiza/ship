<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public $table = 'ships';

    public $incrementing = false;

    protected $fillable = [
        'serial_number', 'name', 'image',
    ];

    public function craws()
    {
        return $this->hasMany(Craw::class, 'ship_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'ship_id');
    }
}
