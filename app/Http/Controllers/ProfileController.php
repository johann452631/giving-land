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
        $profile = User::where('username',$username)->first()->profile;
        return view('sections.profile.index',[
            'profile' => $profile,
            'section' => 'profile'
        ]);
    }

    public function edit()
    {
        return view('sections.profile.edit', [
            'profile' => Auth::user()->profile
        ]);
    }

    public function update(Request $request)
    {
        $profile = Auth::user()->profile;
        if ($profile->image->url != 'default.svg') {
            Storage::delete('public/users_profile_images/' . $profile->image->url);
        }
        $img = $request->file('profile_img');
        $imgName = time() . "_" . str_replace(" ", "_", $img->getClientOriginalName());
        $profile->image->update([
            'url' => $imgName
        ]);
        $img->storeAs('public/users_profile_images', $imgName);
        Utility::sendAlert('success', 'Se actualizó la foto de perfil');
        return to_route('profile.edit');
    }

    public function goToSection($username,$section){
        if(Auth::user()->username !=$username){
            return to_route('profile.show',Auth::user()->username);
        }
        $profile = Auth::user()->profile;
        return view('sections.profile.index',compact('section','profile'));
    }
}
