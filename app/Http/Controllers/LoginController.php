<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailResetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function index()
    {
        return view('sections.login.form-contents', [
            'tituloPagina' => 'Login',
            'titulo' => 'Inicio sesión',
            'rutaSiguiente' => 'login.authenticate',
            'yield' => 'login'
        ]);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Utility::sendAlert('exito', 'Se inició sesión.');
            return to_route('home');
        }

        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }

}
