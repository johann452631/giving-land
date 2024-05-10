<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        $user = Auth::user();
        // dd($user->profile->social_media->first());
        return view('sections.profile.index',[
            'profile' => $user->profile,
            'posts' => $user->posts,
            'socialMedia' => $user->profile->social_media,
            'section' => 'profile'
        ]);
    }
}
