<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function init(){
        return view('home',[
            'products'=> Product::all(),
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
        Utility::sendAlert('peligro', 'Se cerró sesión.');
        return to_route('home');
    }
}
