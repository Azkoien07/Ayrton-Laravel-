<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
         // Validar el idioma
    $validated = $request->validate([
        'language' => 'required|in:es,en',
    ]);

    Session::put('locale', $validated['language']);

    return redirect()->back();
    }
}
