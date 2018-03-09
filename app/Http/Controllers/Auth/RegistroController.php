<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class RegistroController extends Controller
{
    protected function validar(Request $request){

        $rules = [
            "name" => "required",
            "username" => "required|unique:users",
            "password" => "required|confirmed",
            "tipo" => "required"
        ];

        $validator = [
            "name.required" => "Nombre Requerido",
            "username.required" => "Usuario Requerido",
            "username.unique" => "Usuario en Uso",
            "password.required" => "Contraseña Requerida",
            "password.confirmed" => "Debe confirmar la Contraseña",
            "tipo.required" => "Debe seleccionar un tipo de usuario"
        ];

        return $validar = Validator::make($request->all(),$rules, $validator)->validate();
    }

    public function nuevo(Request $request){

        $this->validar($request);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;

        $user->save();

        flash("Usuario creado exitosamente")->success();
        return redirect("/registro");
    }
}
