<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Utilities\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreUser $request)
    {
        session()->forget(['email', 'code']);
        $aux = $request->except('_token');
        $aux['password'] = Hash::make($request->password);
        User::factory()->create($aux);
        Auth::attempt($request->only('email', 'password'));
        Alert::send('success', 'Se registró y se inició sesión.');
        return to_route('home');
    }

    public function create()
    {
        return view('sections.signup.formcontents')->with([
            'titulo' => 'Registro de datos',
            'rutaSiguiente' => 'users.store',
            'yield' => 'data',
        ]);
    }

    public function show($user)
    {
        return view('sections.authentication.navigationsections')->with([
            'titulo' => $user.' - perfil',
            'yield' => 'profile'
        ]);
    }
}
