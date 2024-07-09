<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            $message = 'El correo electrónico o la contraseña son incorrectos.';
            return response()->json([
                'message' => $message,
                'errors' => ['email' => [$message]]
            ],401);
        }
        // $request->session()->regenerate();
        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'accessToken' => $token,
        ]);
    }
}
