<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\MyOwn\classes\Utility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function __construct()
    {
        $this->middleware('guest')->only(['index']);
    }

    public function index()
    {
        return view('sections.login.index');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Utility::sendAlert('success', 'Se inició sesión.');
            return to_route('home');
        }

        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }
}
