<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'created_at',
        'updated_at'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
