<?php
namespace App\MyOwn\classes;

use Illuminate\Support\Facades\Hash;

class Utility
{
    public static function sendAlert(string $type,string $message){
        session()->flash('alert',[
            'type' => $type,
            'message' => $message
        ]);
    }

    public static function sendVerificationCode(string $email): string
    {
        $permitted_chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        session(['plain' => $code]);
        // Mail::to($email)->send(new ValidationMailable($code));
        return Hash::make($code);
    }
}
