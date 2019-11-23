<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $table = 'notifications';

    protected $fillable = [
        'message', 'rank_id', 'ship_id',
    ];

    public function user()
    {
        return $this->belongsTo(Rank::class, 'rank_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'id');
    }
}
