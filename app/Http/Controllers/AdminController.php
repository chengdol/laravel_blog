<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getAdminLogin()
    {
        return view('admin.others.login');
    }

    public function postAdminLogin(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt(['email' => $req['email'], 'password' => $req['password']]))
        {
            return redirect()->back()->with(['fail' => 'Login failed!']);
        }
        return redirect()->route('admin.index');
    }

    public function getAdminLogout()
    {
        // logout
        Auth::logout();
        return redirect()->route('post.index');
    }
}
