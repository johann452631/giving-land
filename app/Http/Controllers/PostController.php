<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit']);
    }

    public function create(){
        $locationData = Location::all();
        $categories = Category::all();
        // dd($locationData);
        return view('sections.posts.create',compact('locationData','categories'));
        
    }
}
