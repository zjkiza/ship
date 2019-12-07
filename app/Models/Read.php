<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Read.
 *
 * @property int                             $id
 * @property int                             $craw_id
 * @property int                             $notification_id
 * @property string                          $date_of_read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\Craw                $craw
 * @property \App\Models\Notification        $notification
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereCrawId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereDateOfRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Read whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
