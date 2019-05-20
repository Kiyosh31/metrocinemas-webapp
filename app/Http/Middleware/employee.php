<?php

namespace Metrocinemas\Http\Middleware;

use Closure;

class employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->role == "emp")
        {
            return redirect()->back()
                ->with(['message' => 'No tienes permiso de administrador']);
        }

        return $next($request);
    }
}
