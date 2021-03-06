<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
            'name','description'
        ];

    public function clients()
    {
        return $this->belongsToMany(Client::class,'category_client', 'category_id', 'client_id');
    }
}
