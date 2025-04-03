<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mckenziearts\Notify\Facades\Notify;


class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        notify()->info('Sesión cerrada correctamente', 'Hasta pronto');
        return redirect('/login');
    }

    // Procesar el formulario de login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            notify()->success('Bienvenido de nuevo', 'Inicio de sesión exitoso');

            if (Auth::user()->role_id == 1) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('tasks.index');
        } else {
            notify()->error('Credenciales incorrectas', 'Error al iniciar sesión');

            return back()->withErrors([
                'email' => 'Las credenciales no coinciden.',
            ]);
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required|integer',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = $request->username;
        $user->role_id = $request->role_id;
        $user->plan_id = 1;
        $user->save();

        Auth::login($user);

        Notify()->success('Cuenta creada exitosamente', '¡Bienvenido a Ayrton!');
        return redirect()->route('tasks.index');
    }
}
