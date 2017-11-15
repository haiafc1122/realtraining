<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';

    public function clients()
    {
        return $this->belongsToMany(Client::class,'CategoryClient', 'category_id', 'client_id');
    }
}
