<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function home(?string $category = null){
        $posts= isset($category) ? Category::where('name',$category)->first()->posts : Post::all();
        return view('home',[
            'categories' => Category::all(),
            'posts'=> $posts,
        ]);
    }

    public static function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        Utility::sendAlert('danger', 'Se cerró sesión.');
        return to_route('home');
    }
}
