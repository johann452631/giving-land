<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailUserStore;
use App\Http\Requests\StoreUser;
use App\Mail\ValidationMailable;
use App\Models\User;
use App\Utilities\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function store(StoreUser $request)
    {
        session()->forget(['email','code']);
        $aux = $request->all();
        $aux['password'] = Hash::make($request->password);
        User::create($aux);
        Auth::attempt($request->only('email','password'));
        Alert::mostrar('success','Se registró y se inició sesión.');
        return to_route('home');
    }

    public function sendCode(EmailUserStore $request)
    {
        $email = $request->email;
        session(['email'=>$email]);
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['code' => $code]);
        Mail::to($email)->send(new ValidationMailable($code));
        return to_route('signup.code');
    }

    public function verifyCode(Request $request)
    {
        $code = session('code');
        $inputcode = strtoupper(implode("", $request->except('_token')));

        if ($code == $inputcode) {
            session()->forget('code');
            return to_route('signup.data');
        }
        return back()->with('errorVerificacion',"El código no coincide");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::mostrar('success','Se inició sesión.');
            return to_route('home');
        }
 
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }
}
