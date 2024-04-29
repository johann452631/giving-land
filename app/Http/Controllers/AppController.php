<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\MyOwn\classes\Utility;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function init(){
        return view('home',[
            'posts'=> Post::all(),
            'categories' => Category::all(),
            'user' => Auth::user(),
            'tituloPagina' => 'Giving-Land'
        ]);
    }

    public function settings()
    {
        return view('sections.authentication.navigationsections',[
            'titulo' => 'Configuración',
            'yield' => 'settings'
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
