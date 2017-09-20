<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostIndex()
    {
        // TODO: fetch all posts with pagination then rendering
        return view("frontend.blog.index");
    }

    /**
     * @param $post_id
     * @param string $side, used to distinguish frontend and backend rendering
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSinglePost($post_id, $side = "frontend")
    {
        // TODO: fetch post then rendering
        return view(  $side . ".blog.single");
    }

    public function getCreatePost()
    {
        // TODO: fetch and pass categories
        return view('admin.blog.create-post');
    }

    public function postCreatePost(Request $req)
    {
        $this->validate($req, [
            'title' => 'required|max:120|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->title = $req['title'];
        $post->author = $req['author'];
        $post->body = $req['body'];
        $post->save();
        // TODO: attach category

        return redirect()->route('admin.index')->with(['success' => 'Post created successfully!']);
    }

}
