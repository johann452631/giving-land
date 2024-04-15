<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailResetPasswordRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function emailResetPasswordForm()
    {
        return view('sections.resetpassword.form-contents', [
            'tituloPagina' => 'Recuperación de contraseña',
            'titulo' => 'Recuperación de contraseña',
            'rutaSiguiente' => 'resetPassword.sendResetPasswordCode',
            'yield' => 'email-request'
        ]);
    }

    public function sendResetPasswordCode(EmailResetPasswordRequest $request)
    {
        session(['destination' => 'resetPassword.newPasswordForm']);
        session(['email' => $request->email]);
        CodeValidationController::sendCode();
        $tokenRepository = new DatabaseTokenRepository(DB::connection(), new BcryptHasher(), 'password_reset_tokens', 'bcrypt ');
        $token =  $tokenRepository->create(Password::getUser($request->only('email')));
        session(['token' => $token]);
        return to_route('codeValidation.codeForm');
    }

    public function newPasswordForm(Request $request)
    {
        return view('sections.resetpassword.form-contents')->with([
            'request' => $request,
            'tituloPagina' => 'Nueva contraseña',
            'titulo' => 'Nueva contraseña',
            'rutaSiguiente' => 'resetPassword.saveNewPassword',
            'yield' => 'new-password'
        ]);
    }

    public function saveNewPassword(NewPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if($status === Password::PASSWORD_RESET){
            Utility::sendAlert('exito', 'Se restauró la contraseña.');
            return to_route('login.index');
        }else{
            return back()->withErrors(['email' => [__($status)]]);
        }

    }
}
