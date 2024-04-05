<?php
namespace App\Utilities;

class Alert
{
    public static function send($type,$message){
        session(['alert'=>[
            'type' => $type,
            'message' => $message
        ]]);
    }    
}
