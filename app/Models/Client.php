<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    protected $table = 'clients';

    use Searchable;

    protected $fillable =[
        'category_id', 'title', 'started_date', 'end_date', 'url', 'banner', 'point_num', 'rate', 'description'
    ];

    public function actions()
    {
        return $this->hasMany(Action::class, 'client_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function get_active_points()
    {
        $active_point = $this->point_num * $this->rate * 0.1;
        return $active_point;
    }

    public function use_possible()
    {
        if ( $this->started_date > now() || $this->end_date < now() || $this->is_active == config('settings.client.active_false')){
            return false;
        } else {
            return true;
        }
    }

    public function active_status()
    {
        $client_status = config('settings.client.status');

        return empty($client_status[$this->is_active]) ? "-" : $client_status[$this->is_active];
    }

}
