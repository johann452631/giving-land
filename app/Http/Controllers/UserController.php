<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Requests\NewEmailRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use App\MyOwn\classes\Utility;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class)->only('create');
        $this->middleware('guest')->only(['create','store']);
        $this->middleware('auth')->only(['update','destroy']);
    }
    public function create(Request $request)
    {
        return view('sections.users.create')->with([
            'rutaSiguiente' => 'users.store',
            'email' => $request->email,
            'email_verified_at' => now()
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        session()->forget('token');
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->except('_token'));
        $user->update(['username' => str_replace(" ", "_", strtolower($user->name)) . "_" . $user->id]);
        $profile = Profile::create([
            'user_id' => $user->id
        ]);

        Image::create([
            'url' => 'default.svg',
            'imageable_id' => $profile->id,
            'imageable_type' => Profile::class
        ]);
        Auth::login($user);
        $request->session()->regenerate();
        Utility::sendAlert('success', 'Se registró y se inició sesión.');
        return to_route('home');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        Utility::sendAlert('exito', 'Se actualizaron los datos');
        if ($request->url_profile_img == null) {
            $user->update($request->except(['_token', '_method', 'url_profile_img']));
        } else {
            ($user->url_profile_img != 'default.svg') ? Storage::delete('public/users_profile_images/' . $user->url_profile_img) : '';
            $img = $request->file('url_profile_img');
            $imgName = time() . "_" . str_replace(" ", "_", $img->getClientOriginalName());
            $aux = $request->except('_token', '_method');
            $aux['url_profile_img'] = $imgName;
            $user->update($aux);
            $img->storeAs('public/users_profile_images', $imgName);
        }
        Auth::login($user);
        return to_route('users.show', $user->username);
    }

    public function destroy($id){
        User::destroy($id);
    }

    public function deletePhoto($id)
    {
        $user = User::find($id);
        Storage::delete('public/users_profile_images/' . $user->url_profile_img);
        $user->update(['url_profile_img' => 'default.svg']);
        Auth::login($user);
        return to_route('users.edit', $user->username);
    }
}
