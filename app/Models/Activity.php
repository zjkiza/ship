<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends Model
{
    protected $table = 'activities';
    protected $guarded = [];

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }
}
