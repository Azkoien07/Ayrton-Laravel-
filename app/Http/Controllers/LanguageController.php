<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $language = $request->input('language');
        Session::put('locale', $language); // Guarda en sesión
        return back(); // Redirige a la vista anterior
    }
}
