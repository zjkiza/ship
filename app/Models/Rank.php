<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rank.
 *
 * @property int                                                                 $id
 * @property string                                                              $name
 * @property \Illuminate\Support\Carbon|null                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                     $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Craw[]         $craws
 * @property int|null                                                            $craws_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Notification[] $notifications
 * @property int|null                                                            $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rank whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
