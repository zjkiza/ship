<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ship.
 *
 * @property string                                                              $serial_number
 * @property string                                                              $name
 * @property string                                                              $image
 * @property \Illuminate\Support\Carbon|null                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                     $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Craw[]         $craws
 * @property int|null                                                            $craws_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Notification[] $notifications
 * @property int|null                                                            $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
