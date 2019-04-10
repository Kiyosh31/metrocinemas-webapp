<?php

namespace Metrocinemas\Http\Middleware;

use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     * composer dump-autload por si no reconoce la clase
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->role != 'admin')
        {
            return redirect()->back()
                ->with(['message' => 'No tienes permisos de administrador']);
        }

        return $next($request);
    }
}
