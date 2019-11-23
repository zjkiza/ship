<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Craw extends Model
{
    public $table = 'craws';

    protected $fillable = [
        'name', 'sur_name', 'user_id', 'rank_id', 'ship_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
