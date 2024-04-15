<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        session()->forget('email');
        $request->merge(['password' => Hash::make($request->password)]);
        Auth::login(User::factory()->create($request->except('_token')));
        $request->session()->regenerate();
        Utility::sendAlert('exito', 'Se registró y se inició sesión.');
        return to_route('home');
    }

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

    public function show()
    {
        $user = auth()->user();
        return view('sections.users.show',[
            'tituloPagina' => 'Perfil'.' - '.$user->username,
            'user' => $user
        ]);
    }
}
