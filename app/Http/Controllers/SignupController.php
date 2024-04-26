<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('sections.signup.index', [
            'content' => 'email',
            'rutaSiguiente' => 'signup.sendCode',
            'token' => bin2hex(random_bytes(5)),
        ]);
    }

    public function sendCode(NewEmailRequest $request)
    {
        session(['hashed' => CodeValidationController::sendCode($request->email)]);
        return to_route('signup.codeForm', $request->only(['email','token']));
    }

    public function codeForm(Request $request)
    {
        return $request->token;
        return view('sections.signup.index', [
            'content' => 'code',
            'rutaSiguiente' => 'signup.verifyCode',
            'request' => $request,
        ]);
    }
    public function verifyCode(Request $request)
    {
        $inputCode = strtoupper(implode("", $request->except(['_token', 'hashed', 'email'])));
        return (Hash::check($inputCode, $request->hashed)) ? to_route('users.create', [
            'token' => bin2hex(random_bytes(25)),
            'email' => $request->email
        ]) : back()->with('errorVerificacion', "El código no coincide");
    }
}
