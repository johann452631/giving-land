<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEmailRequest;

class SignupController extends Controller
{
    public function index()
    {
        return view('sections.signup.form-contents')->with([
            'tituloPagina' => 'Registro',
            'titulo' => 'Registro',
            'rutaSiguiente' => 'signup.sendCode',
            'yield' => 'email'
        ]);
    }

    public function sendCode(NewEmailRequest $request){
        session(['destination'=>'users.create']);
        session(['email' => $request->email]);
        CodeValidationController::sendCode();
        return to_route('codeValidation.codeForm');
    }
}
