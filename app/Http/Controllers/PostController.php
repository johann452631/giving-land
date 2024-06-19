<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Location;
use App\Models\Post;
use App\MyOwn\classes\Utility;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
    }

    public function create()
    {
        $post = null;
        return view('sections.posts.create-edit', compact('post'));
    }

    public function edit($index)
    {
        $post = auth()->user()->posts->where('user_post_index',$index)->first();
        return ($post) ? view('sections.posts.create-edit',compact('post')) : to_route('posts.create');
    }
}
