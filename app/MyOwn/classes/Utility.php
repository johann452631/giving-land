<?php
namespace App\MyOwn\classes;

class Utility
{
    public static function sendAlert(string $type,string $message){
        session()->flash('alert',[
            'type' => $type,
            'message' => $message
        ]);
    }
}
