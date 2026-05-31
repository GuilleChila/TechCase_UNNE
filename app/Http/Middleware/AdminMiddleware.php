<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/principal')->withErrors([
                'email' => 'Debés iniciar sesión para acceder a esa sección.'
            ]);
        }

        if (Auth::user()->perfil_id !== 2) {
            return redirect('/principal')->withErrors([
                'email' => 'Acceso denegado. No tenés permisos de Administrador.'
            ]);
        }

        return $next($request);
    }
}
