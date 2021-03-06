<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    protected $table = 'clients';

    use Searchable;

    protected $fillable =[
        'title', 'started_date', 'end_date', 'url', 'banner', 'point_num', 'rate', 'description'
    ];

    public function actions()
    {
        return $this->hasMany(Action::class, 'client_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_client', 'client_id', 'category_id');
    }

    public function get_active_points()
    {
        $active_point = $this->point_num * $this->rate * 0.1;
        return $active_point;
    }

}
