<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable =[
        'title', 'start_date', 'end_date', 'url', 'banner', 'point_num', 'rate', 'description'
    ];

    public function actions()
    {
        return $this->hasMany(Action::class, 'client_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'CategoryClient', 'client_id', 'category_id');
    }
}
