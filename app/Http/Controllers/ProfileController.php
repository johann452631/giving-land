<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('sections.profile.show',[
            'profile' => $user->profile,
            'posts' => $user->posts
        ]);
    }
}
