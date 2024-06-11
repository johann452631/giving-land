<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use App\MyOwn\classes\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($username)
    {
        $profile = ($username) ?  User::where('username',$username)->first()->profile : Auth::user()->profile;
        return view('sections.profile.index',[
            'profile' => $profile,
            'section' => 'profile'
        ]);
    }

    public function edit()
    {
        $username = Auth::user()->username;
        return view('sections.profile.edit',compact('username'));
    }

    public function goToSection($username,$section){
        if(Auth::user()->username !=$username){
            return to_route('profile.show',Auth::user()->username);
        }
        $profile = Auth::user()->profile;
        return view('sections.profile.index',compact('section','profile'));
    }
}
