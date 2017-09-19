<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex()
    {
        // fetch posts and messages
        return view('admin.index');
    }
}
