<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view("frontend.others.contact");
    }
}
