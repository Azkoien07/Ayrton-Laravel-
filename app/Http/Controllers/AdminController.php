<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pqr;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
        return view('admin.ranking',compact('ranking'));
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

    //desabilitar usuario
    public function destroy(User $users){
        $users->delete();
        return redirect()->route('admin.index')->with('succes', 'usuario desabilitado');
    }
 }
