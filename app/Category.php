<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
    // define relationship with posts table
    public function posts()
    {
        // assign pivot table name
        return $this->belongsToMany('Post', 'posts_categories');
    }
}
