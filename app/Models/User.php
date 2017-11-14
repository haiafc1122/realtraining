<?php

namespace App\Models;

use Illuminate\Notifications\Action;
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
        'name', 'email', 'password', 'gender', 'phone_number', 'location', 'is_active'
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
        return $this->hasOne(UserPoint::class, 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'user_id');
    }
}
