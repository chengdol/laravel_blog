<?php

namespace App\Http\Controllers;

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



}
