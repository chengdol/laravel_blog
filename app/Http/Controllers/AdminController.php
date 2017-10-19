<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex()
    {
        // fetch posts and messages
        // order by create time, only take 3
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $contact_messages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.index', [ 'posts' => $posts, 'contact_messages' => $contact_messages]);
    }
}
