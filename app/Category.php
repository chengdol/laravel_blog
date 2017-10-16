<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // define relationship with posts table
    public function posts()
    {
        // assign pivot table name
        return $this->belongsToMany('App\Post', 'posts_categories');
    }
}
