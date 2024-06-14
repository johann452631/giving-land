<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Post;
use App\Models\User;
use App\MyOwn\classes\Utility;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
    }

    public function create()
    {
        $locations = Location::all();
        $categories = Category::all();
        return view('sections.posts.create', compact('locations', 'categories'));
    }

    public function store(Request $request)
    {
        $rules = $request->has('expected_item') ? StoreUpdatePostRequest::rules() : Arr::except(StoreUpdatePostRequest::rules(), 'expected_item');
        $validated = Validator::make(
            $request->all(),
            $rules,
            [
                'purpose.required' => 'El propósito es requerido',
                'expected_item.required' => 'El artículo de interés es requerido',
                'location_id.required' => 'La ubicación es requerida',
                'category_id.required' => 'La categoría es requerida',
            ]
        )->validate();
        $post = Post::create($validated);
        Auth::user()->posts()->save($post);
        Utility::sendAlert('success','Se publicó el artículo');
        return to_route('profile.show',Auth::user()->username);
    }
}
