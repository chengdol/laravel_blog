<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex()
    {
        // fetch posts and messages
        // order by create time, only take 3
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('admin.index', [ 'posts' => $posts]);
    }
}
