<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getPostIndex()
    {
        // fetch posts with pagination then rendering
        $posts = Post::paginate(3);
        // shorten post body length
        foreach ($posts as $post)
        {
            // call private method prefixed with $this
            $post->body = $this->shortenText($post->body, 40);
        }
        return view("frontend.blog.index", [ 'posts' => $posts]);
    }

    public function getAdminPostIndex()
    {
        // fetch posts with pagination then rendering
        $posts = Post::paginate(5);
        return view("admin.blog.post-index", [ 'posts' => $posts]);
    }

    private function shortenText($text, $word_counts)
    {
        if (str_word_count($text, 0) > $word_counts)
        {
            $words = str_word_count($text, 2);
            $positions = array_keys($words);
            $text = substr($text,0, $positions[$word_counts]). '...';
        }
        return $text;
    }

    /**
     * @param $post_id
     * @param string $side, used to distinguish frontend and backend rendering
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSinglePost($post_id, $side = "frontend")
    {
        // $side is default parameter, can ignore it when passing parameters
        $post = Post::find($post_id);
        // check if post exist?
        if (!$post)
        {
            return redirect()->route('post.index')->with(['fail' => 'post does not exist!']);
        }
        return view(  $side . ".blog.single", ['post' => $post ]);
    }

    public function getCreatePost()
    {
        // TODO: fetch and pass categories
        return view('admin.blog.create-post');
    }

    public function postCreatePost(Request $req)
    {
        $this->validate($req, [
            // unique in posts table
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



    // edit post
    public function getEditPost($post_id)
    {
        $post = Post::find($post_id);
        if (!$post)
        {
            // redirect
            return redirect()->route('admin.index')->with(['fail' => 'Post not found!']);
        }
        // find categories


        return view('admin.blog.edit-post',['post' => $post]);
    }

    public function postEditPost(Request $req)
    {
        // validate input
        $this->validate($req, [
            // title no need unique
            'title' => 'required|max:120',
            'author' => 'required|max:80',
            'body' => 'required'
        ]);
        // fetch previous post
        $post = Post::find($req['post_id']);
        $post->title = $req['title'];
        $post->author = $req['author'];
        $post->body = $req['body'];
        // here need to check failed!
        $post->update();

        // categories ...


        return redirect()
            ->route('admin.post.single', ['post_id' => $post->id, 'side' => 'admin'])
            ->with(['success' => 'post updated successfully!']);
    }

    // delete post
    public function getPostDelete($post_id)
    {
        $post = Post::find($post_id);
        if (!$post)
        {
            // redirect
            return redirect()
                ->route('admin.index')
                ->with(['fail' => 'post not found!']);
        }
        // delete
        $post->delete();

        return redirect()
            ->route('admin.index')
            ->with(['success' => 'post delete successfully!']);
    }

}
