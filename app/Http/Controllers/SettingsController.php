<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        
        return view('settings.settings');
    }

    public function updateProfile(Request $request){
        //validacion de credenciales
       $validate = $request->validate([
           'name'=>'required|string|max:200',
          'email'=> ['required',
          'string',
          'email',
          'max:200',
          'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com(\.co)?$/'
       ],
    ],[
        'name.requiered'=> 'El nombre es obligatorio',
        'name.min'=> 'El nombre debe tener minimo 5 caracteres',
        'email.requiered'=>'El correo es obligatorio',
        'email.email'=>'introducir un correo valido',
        'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|gmail\.com\.co|outlook\.com|yahoo\.com)$/i'],
        'email.unique' => 'Este correo electronico ya esta en uso',
    ]);

      return redirect()->route('settings')->with('success','Perfil actualizado correctamente');
    }
}
