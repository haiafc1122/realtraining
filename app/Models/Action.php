<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = [
        'user_id', 'client_id', 'point', 'state'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function show_status()
    {
        $action_status = config('settings.action.state');

        return empty($action_status[$this->state]) ? "-" : $action_status[$this->state];
    }

    public function show_toggle_approval()
    {
        $toggle_status = config('settings.action.toggle.approval');
        return empty($toggle_status[$this->state]) ? "-" : $toggle_status[$this->state];
    }
    public function show_toggle_reject()
    {
        $toggle_status = config('settings.action.toggle.reject');
        return empty($toggle_status[$this->state]) ? "-" : $toggle_status[$this->state];
    }
}
