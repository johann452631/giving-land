<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ValidationMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function create(Request $request)
    {
        session()->invalidate();
        $aux = $request->all();
        $aux['password'] = Hash::make($request->password);
        User::create($aux);
        return to_route('home');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email'
        ]);
        $email = $request->email;
        session(['email'=>$email]);
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['code'=>$code]);
        Mail::to($email)->send(new ValidationMailable($code));
        return to_route('signup.code');
    }

    public function verifyCode(Request $request)
    {
        $code = $request->session()->get('code');
        $codeform = implode("", $request->except('_token'));

        if ($code == $codeform) {
            return to_route('signup.data');
        }
        return back()->with('errorVerificacion',"El código no coincide");
        // return session()->all();
    }
}
