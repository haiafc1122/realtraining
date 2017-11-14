<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $table = 'user_point';

    protected $fillable = [
        'user_id', 'pending_point', 'approval_point', 'reject_point'
    ];

    public function user()
    {
        return $this->belongsTo('User::class');
    }

}
