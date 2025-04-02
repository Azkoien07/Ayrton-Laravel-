<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pqr;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar los usuarios
        $users = User::all();
        return view('admin.index', compact('users'));
    }


    //mostrar los pqrs
    public function pqrs()
    {
        $pqrs = Pqr::all();
        return view('admin.pqrs', compact('pqrs'));
    }

    public function ranking()
    {
        $ranking = Ranking::all();
        return view('admin.ranking', compact('ranking'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $validated = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ])->validate();
        
        $user->update($validated);
        return response()->json(['success' => true, 'message' => 'Usuario actualizado']);
    }
    
    //desabilitar usuario
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        $userCount = User::count();
        return response()->json(['success' => true, 'message' => 'Usuario eliminado', 'userCount' => $userCount]);
    }
    
 }
