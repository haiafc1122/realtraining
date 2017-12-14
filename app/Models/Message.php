<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
         'content', 'user_id', 'is_public'
    ];

    public function messageToUser()
    {
        return $this->hasOne(MessageToSupporter::class, 'message_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
