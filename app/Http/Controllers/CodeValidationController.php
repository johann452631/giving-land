<?php

namespace App\Http\Controllers;

use App\Mail\ValidationMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CodeValidationController extends Controller
{
    public static function sendCode(): void
    {
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['plain' => $code]);
        // Mail::to(session('email'))->send(new ValidationMailable($code));
        session(['code' => Hash::make($code)]);
    }

    public function codeForm()
    {
        return view('sections.codevalidation.form-contents', [
            'tituloPagina' => 'Validación',
            'titulo' => 'Verificación de código',
            'rutaSiguiente' => 'codeValidation.verifyCode',
            'yield' => 'code',
        ]);
    }

    public function verifyCode(Request $request)
    {
        $inputCode = strtoupper(implode("", $request->except('_token')));
        $hashedCode = session('code');
        if (Hash::check($inputCode, $hashedCode)) {
            session()->forget('code');
            if (null !== session('token')) {
                $email = session('email');
                $token = session('token');
                session()->forget(['email','token']);
                return to_route(session('destination'), [
                    'email' => $email,
                    'token' => $token
                ]);
            }
            return to_route(session('destination'));
        }
        return back()->with('errorVerificacion', "El código no coincide");
    }

    // public function prueba()
    // {
    //     $tokenRepository = new DatabaseTokenRepository(DB::connection(),new BcryptHasher(), 'password_reset_tokens', 'bcrypt ');

    //     return $tokenRepository->create(Password::getUser(['email'=>'alejoimbachihoyos@gmail.com']));
    // }
}
