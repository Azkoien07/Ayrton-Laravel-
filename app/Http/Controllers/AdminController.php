<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function pqrs()
    {
        return view('pqrs.pqrs');
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
    // public function destroy(Admin $admin)
//     {
//         //
//     }
 }
