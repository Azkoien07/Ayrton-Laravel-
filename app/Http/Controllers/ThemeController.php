<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function setTheme(Request $request)
    {
        $request->validate([
            'theme' => 'in:light,dark'
        ]);

        $theme = $request->input('theme', 'light');
        
        // Store theme in session
        session(['theme' => $theme]);

        return response()->json([
            'status' => 'success',
            'theme' => $theme
        ]);
    }
}