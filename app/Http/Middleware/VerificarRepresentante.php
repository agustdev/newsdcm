<?php

namespace App\Http\Middleware;

use App\Models\Representantes;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class VerificarRepresentante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user) {
            // Verificar si el usuario es representante
            $esRepresentante = Representantes::where('documento', $user->documento)->exists();

            if ($esRepresentante) {
                // 🔹 Solo mostramos el mensaje una vez por sesión
                if (!session()->has('representante_mensaje_mostrado')) {
                    Session::flash('representante_registrado', true);
                    Session::put('representante_mensaje_mostrado', true);
                }
            }
        }

        return $next($request);
    }
}
