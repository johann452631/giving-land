<?php

namespace App\Http\Controllers;

use App\Mail\ValidationMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CodeValidationController extends Controller
{
    public static function sendCode(string $email): string
    {
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['plain' => $code]);
        // Mail::to($email)->send(new ValidationMailable($code));
        return Hash::make($code);
    }
}
