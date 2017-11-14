<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function messageToAdmin()
    {
        return $this->hasOne(MessageToAdmin::class, 'message_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
