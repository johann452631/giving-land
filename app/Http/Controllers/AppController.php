<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailUserStore;
use App\Http\Requests\LoginRequest;
use App\Mail\ValidationMailable;
use App\Models\Product;
use App\Utilities\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function init(){
        return view('layouts.body-home')->with('products',Product::all());
    }
    public function settings()
    {
        return view('sections.authentication.navigationsections')->with([
            'titulo' => 'Configuración',
            'yield' => 'settings'
        ]);
    }

    public function login(){
        return view('sections.login.form-contents')->with([
            'titulo' => 'Inicio de sesión',
            'rutaSiguiente' => 'app.auth',
            'yield' => 'login',
        ]);
    }

    public function auth(LoginRequest $request)
    {
        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Utility::sendAlert('exito', 'Se inició sesión.');
            return to_route('home');
        }

        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }

    public static function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        Utility::sendAlert('peligro', 'Se cerró sesión.');
        return to_route('home');
    }

    public function signup()
    {
        return view('sections.signup.form-contents')->with([
            'titulo' => 'Registro',
            'rutaSiguiente' => 'app.signupSendCode',
            'yield' => 'email',
        ]);
    }

    public function signupSendCode(EmailUserStore $request)
    {
        $email = $request->email;
        session(['email' => $email]);
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['code' => $code]);
        Mail::to($email)->send(new ValidationMailable($code));
        return to_route('app.signupCode');
    }

    public function signupCode()
    {
        return view('sections.signup.form-contents')->with([
            'titulo' => 'Verificación de código',
            'rutaSiguiente' => 'app.signupVerifyCode',
            'yield' => 'code',
        ]);
    }

    public function signupVerifyCode(Request $request)
    {
        $code = session('code');
        $inputcode = strtoupper(implode("", $request->except('_token')));

        if ($code == $inputcode) {
            session()->forget('code');
            return to_route('users.create');
        }
        return back()->with('errorVerificacion', "El código no coincide");
    }
}
