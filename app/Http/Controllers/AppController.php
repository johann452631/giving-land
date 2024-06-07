<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function home(){
        $posts = Post::all();
        $categories = Category::all();
        return view('home',compact('posts','categories'));
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
