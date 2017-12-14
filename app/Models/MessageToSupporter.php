<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageToSupporter extends Model
{

    protected $table = 'message_to_supporter';
    protected $fillable = [
        'user_id', 'message_id'
    ];
    public $timestamps = false;

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
