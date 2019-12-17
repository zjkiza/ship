<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User.
 *
 * @property int                                                                                                       $id
 * @property string                                                                                                    $name
 * @property string                                                                                                    $role
 * @property string                                                                                                    $email
 * @property \Illuminate\Support\Carbon|null                                                                           $email_verified_at
 * @property string                                                                                                    $password
 * @property string|null                                                                                               $remember_token
 * @property \Illuminate\Support\Carbon|null                                                                           $created_at
 * @property \Illuminate\Support\Carbon|null                                                                           $updated_at
 * @property \App\Models\Craw                                                                                          $craw
 * @property \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property int|null                                                                                                  $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
 * @property Ship                            $ship
 * @property Rank                            $rank
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
	class Craw extends \Eloquent {}
}

namespace App\Models{
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
	class Ship extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Activity extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 */
	class Read extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Read[] $reads
 * @property-read int|null $reads_count
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
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
	class Rank extends \Eloquent {}
}

