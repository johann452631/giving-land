<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\MyOwn\classes\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(){
        return view('sections.profile.index');
    }

    public function edit(){
        return view('sections.profile.edit',[
            'profile' => Auth::user()->profile
        ]);
    }

    public function update(Request $request){
        $profile = Auth::user()->profile;
        if ($request->profile_img == null) {
            $profile->update($request->except(['_token', '_method', 'profile_img']));
        } else {
            ($profile->image->url != 'default.svg') ? Storage::delete('public/users_profile_images/' . $profile->image->url) : '';
            $img = $request->file('profile_img');
            $imgName = time() . "_" . str_replace(" ", "_", $img->getClientOriginalName());
            $profile->image->update([
                'url' => $imgName
            ]);
            $img->storeAs('public/users_profile_images', $imgName);
        }
        Utility::sendAlert('success', 'Se actualizaron los datos');
        return to_route('profile.show');
    }

    public function deletePhoto(){
        $profile = Auth::user()->profile;
        Storage::delete('public/user_profile_images/'.$profile->image->url);
        $profile->image->update([
            'url' => 'default.svg'
        ]);

        Utility::sendAlert('warning', 'Se eliminó tu foto de perfil');

        return back();
    }
}
