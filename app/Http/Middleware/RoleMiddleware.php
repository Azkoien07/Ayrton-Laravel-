<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Si el usuario no está autenticado, redirige al login con notificación
        if (!Auth::check()) {
            notify()->error('Debes iniciar sesión para acceder.', 'Acceso denegado');
            return redirect()->route('login');
        }

        // Si el usuario no tiene el rol adecuado, muestra una notificación y redirige
        if (Auth::user()->role_id != $role) {
            notify()->error('No tienes permiso para acceder a esta página.', 'Acceso restringido');
            return redirect()->route('dashboard'); // Puedes cambiar la ruta de redirección
        }

        return $next($request);
    }
}
