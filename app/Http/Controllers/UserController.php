<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editar()
    {
        return view('gestion-perfil.editar');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|unique:users,name,'.$id,
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        flash('Usuario modificado exitosamente','success');
        return redirect()->route('user.editar',$user->id);
    }
}
