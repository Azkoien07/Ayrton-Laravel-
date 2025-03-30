<?php

namespace App\Http\Controllers;

use App\Models\Pqr;
use Illuminate\Http\Request;
use App\Models\Ranking;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pqrs = Pqr::all();
        return view('admin.pqrs', compact('pqrs'));
    }

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
    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('admin.index')->with('succes', 'usuario desabilitado');
    }
}
