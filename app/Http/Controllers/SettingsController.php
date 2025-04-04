<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.settings');
    }

    public function guardarPerfil(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:20',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'email' => [
                'required',
                'email',
                'max:40',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|gmail\.com\.co|outlook\.com|yahoo\.com)$/i'
            ],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe tener más de 20 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes ingresar un correo válido.',
            'email.max' => 'El correo no debe tener más de 40 caracteres.',
            'email.regex' => 'Solo se permiten correos de Gmail, Outlook o Yahoo.',
        ]);

        Auth::user()->update([
            'name' => $request->nombre,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    public function guardarPreferencias(Request $request)
    {
        session(['theme' => $request->theme]);
        app()->setLocale($request->language);

        return back()->with('success', 'Preferencias guardadas correctamente.');
    }

    public function guardarNotificaciones(Request $request)
    {
        Auth::user()->update([
            'email_notifications' => $request->has('notificaciones_email'),
            'push_notifications' => $request->has('notificaciones_push'),
        ]);

        return back()->with('success', 'Notificaciones actualizadas.');
    }

    public function guardarSeguridad(Request $request)
    {
        
        return back()->with('success', 'Configuración de seguridad guardada.');
    }
}
