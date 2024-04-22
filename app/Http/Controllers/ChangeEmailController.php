<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEmailRequest;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Auth;

class ChangeEmailController extends Controller
{
    public function index(){
        return view('sections.users.edit', [
            'tituloPagina' => 'Editar correo electrónico',
            'yield' => 'edit-email',
            'user' => auth()->user()
        ]);
    }

    public function sendCode(NewEmailRequest $request)
    {
        session([
            'destination' => 'changeEmail.change',
            'email' => $request->email
        ]);

        CodeValidationController::sendCode($request->email);

        return to_route('changeEmail.codeForm',auth()->user()->username);
    }

    public function codeForm(){
        return view('sections.users.edit', [
            'tituloPagina' => 'Editar correo electrónico',
            'yield' => 'code-form',
            'user' => auth()->user()
        ]);
    }

    public function change(){
        $user = User::find(auth()->user()->id);
        $user->update(['email' => session('email')]);
        Auth::login($user);
        // dd(auth()->user());
        session()->forget(['email','destination']);
        Utility::sendAlert('exito','Se actualizó el correo electrónico');
        return to_route('users.edit',$user->username);
    }
}
