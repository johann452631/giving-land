<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create()
    {
        return view('sections.authentication.navigationsections')->with([
            'titulo' => 'Publicar',
            'yield' => 'newpost'
        ]);
    }
}
