<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit']);
    }

    public function create(){
        return view('sections.posts.create');
        
    }
}
