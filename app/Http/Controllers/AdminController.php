<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pqr;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.index', compact('users'));
    }


    public function pqrs()
    {
        $pqrs = Pqr::with(['user', 'category'])
                 ->latest()
                 ->paginate(10);
        
        return view('admin.pqrs', compact('pqrs'));
    }

    public function ranking()
    {
        $ranking = Ranking::with('user')
        ->orderBy('score', 'desc')
        ->paginate(10);
        
        return view('admin.ranking', compact('ranking'));
    }
     // Mostrar formulario de edición
     public function edit($id)
     {
         $user = User::findOrFail($id);
         return view('admin.edit', compact('user'));
     }
 
     // Actualizar usuario
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,'.$id,
             'role' => 'required|in:user,admin'
         ]);
 
         $user = User::findOrFail($id);
         $user->update([
             'name' => $request->name,
             'email' => $request->email,
             'role' => $request->role
         ]);
         
         Notify()->success('Usuario actualizado correctamente', 'Éxito');
         return redirect()->route('admin.index');
     }
 
     // Eliminar usuario
     public function destroy($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
        
         Notify()->warning('Usuario eliminado correctamente', 'Usuario Eliminado');
         return redirect()->route('admin.index');
     }

}