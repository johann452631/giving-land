<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailSignupRequest;

class SignupController extends Controller
{
    public function index()
    {
        session(['destination'=>'users.create']);
        return view('sections.signup.form-contents')->with([
            'tituloPagina' => 'Registro',
            'titulo' => 'Registro',
            'rutaSiguiente' => 'signup.sendCode',
            'yield' => 'email'
        ]);
    }

    public function sendCode(EmailSignupRequest $request){
        session(['email' => $request->email]);
        CodeValidationController::sendCode();
        return to_route('codeValidation.codeForm');
    }
}
