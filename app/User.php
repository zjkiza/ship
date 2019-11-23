<?php

namespace App;

use App\Models\Craw;
use App\Notifications\FirstLogin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public const ADMIN = 'admin';
    public const ROLE = ['worker', 'admin'];

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function craw()
    {
        return $this->hasOne(Craw::class, 'user_id');
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new FirstLogin($token));
    }
}
