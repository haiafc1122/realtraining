<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageToAdmin extends Model
{
    protected $table = 'message_to_admin';

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }
    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
