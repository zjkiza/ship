<?php

namespace App\Models;

use App\Service\RecordsActivity\RecordsActivity;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Notification.
 *
 * @property int                             $id
 * @property int                             $rank_id
 * @property string                          $ship_id
 * @property string                          $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\Ship                $ship
 * @property \App\Models\Rank                $rank
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereRankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereShipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Notification extends Model
{
    use RecordsActivity;

    public $table = 'notifications';

    protected $fillable = [
        'message', 'rank_id', 'ship_id',
    ];

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'serial_number');
    }

    public function reads()
    {
        return $this->hasMany(Read::class, 'notification_id', 'id');
    }
}
