<?php
namespace App\Utilities;

class Utility
{
    public static function sendAlert($type,$message){
        session()->flash('alert',[
            'type' => $type,
            'message' => $message
        ]);
        // session()->flash('alert','joole');
    }
}
