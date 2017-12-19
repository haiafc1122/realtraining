<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'phone_number', 'location', 'is_active','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userPoint()
    {
        return $this->hasOne(UserPoint::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class)->orderBy('created_at', 'desc');
    }

    public function active_status()
    {
        $user_status = config('settings.user.status');

        return empty($user_status[$this->is_active]) ? "-" : $user_status[$this->is_active];
    }
}
