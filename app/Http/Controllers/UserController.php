<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $modelUser = new User();
        $modelUser->name = $request->name;
        $modelUser->email = $request->email;
        $modelUser->password = $request->password;
        $modelUser->save();
        return to_route('home');
    }
    
    public function sendCode(Request $request){
        $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);
        return $this->viewCode($request->email);
    }

    public function viewCode($email)
    {
        return view('sections.signup.formcontents')->with([
            'titulo' => 'Verificación de código',
            'rutaSiguiente' => 'signup.data',
            'yield' => 'code',
            'email' => $email
        ]);
    }

    public function verifyCode(Request $request){
        return $this->viewData($request->email);
    }

    public function viewData($email){
        return view('sections.signup.formcontents')->with([
            'titulo' => 'Registro de datos',
            'rutaSiguiente' => 'signup.create',
            'yield' => 'data',
            'email' => $email
        ]);
    }
}
