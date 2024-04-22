<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewEmailRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create()
    {
        session()->forget('destination');
        return view('sections.users.create')->with([
            'tituloPagina' => 'Registro de datos',
            'titulo' => 'Registro de datos',
            'rutaSiguiente' => 'users.store',
            'yield' => 'create',
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        session()->forget('email');
        $request->merge(['password' => Hash::make($request->password)]);
        Auth::login(User::factory()->create($request->except('_token')));
        $request->session()->regenerate();
        Utility::sendAlert('exito', 'Se registró y se inició sesión.');
        return to_route('home');
    }

    public function show()
    {
        return view('sections.users.show', [
            'tituloPagina' => 'Perfil',
            'yield' => 'show',
            'user' => auth()->user()
        ]);
    }

    public function edit()
    {
        return view('sections.users.edit', [
            'tituloPagina' => 'Editar perfil',
            'yield' => 'edit',
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        Utility::sendAlert('exito', 'Se actualizaron los datos');
        if ($request->url_profile_img == null) {
            $user->update($request->except(['_token', '_method','url_profile_img']));
        }else{
            ($user->url_profile_img != null) ? Storage::delete('public/users_profile_images/' . $user->url_profile_img) : '';
            $img = $request->file('url_profile_img');
            $imgName = time() . "_" . str_replace(" ", "_", $img->getClientOriginalName());
            $aux = $request->except('_token','_method');
            $aux['url_profile_img'] = $imgName;
            $user->update($aux);
            $img->storeAs('public/users_profile_images', $imgName);
        }
        Auth::login($user);
        return to_route('users.show',$user->username);
    }
}
