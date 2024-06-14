<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\Location;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit']);
    }

    public function create(){
        $locations = Location::all();
        $categories = Category::all();
        return view('sections.posts.create',compact('locations','categories'));
    }

    public function store(Request $request){
        // $request->except()
        // dd($request);
        if ($request->has('expected_item')) {
            $request->validate(StoreUpdatePostRequest::rules());
        }else{
            $request->validate(Arr::except(StoreUpdatePostRequest::rules(),'expected_item'));
        }
        dd($request);
    }
}
