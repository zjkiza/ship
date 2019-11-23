<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    public $table = 'reads';

    protected $fillable = [
        'date_of_read', 'craw_id', 'notification_id',
    ];

    public function craw()
    {
        return $this->belongsTo(Craw::class, 'craw_id', 'id');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id', 'id');
    }
}
