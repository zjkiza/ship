<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int $subject_id
 * @property string $subject_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Activity $subject
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereUserId($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    protected $table = 'activities';
    protected $guarded = [];

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }
}
