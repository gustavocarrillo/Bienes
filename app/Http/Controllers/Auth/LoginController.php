<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    protected function validar(Request $request){

        $rules = [
            "username" => "required",
            "password" => "required"
        ];

        $validator = [
            "username.required" => "Debe introducir un Usuario",
            "password.required" => "Debe introducir una Contraseña",
        ];

        $validar = Validator::make($request->all(),$rules,$validator)->validate();
    }

    public function autenticar(Request $request){

        $this->validar($request);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        }

        flash('Usuario o contraseña incorrecta')->error();
        return redirect('/login');
    }
}