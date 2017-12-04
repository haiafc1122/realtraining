<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'content', 'checked', 'location'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function show_status()
    {
        if ($this->checked == config('settings.contact.checked'))
        {
            return "確認済み";
        } else {
            return "確認する";
        }
    }

}
