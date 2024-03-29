<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ValidationMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $aux = $request->all();
        $aux['password'] = Hash::make($request->password);
        User::create($aux);
        return to_route('home');
    }
    
    public function sendCode(Request $request){
        $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);
        $email = $request->email;
        Mail::to($email)->send(new ValidationMailable);
        return $this->viewCode($email);
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
