<?php
namespace App\Utilities;

class Alert
{
    public static function mostrar($type,$message){
        session(['alert'=>[
            'type' => $type,
            'message' => $message
        ]]);
    }    
}
