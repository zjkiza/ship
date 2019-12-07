<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Craw.
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $sur_name
 * @property int                             $user_id
 * @property int                             $rank_id
 * @property string                          $ship_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\User                       $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereRankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereShipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereSurName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Craw whereUserId($value)
 * @mixin \Eloquent
 */
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
