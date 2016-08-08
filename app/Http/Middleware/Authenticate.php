<?php

namespace Cinema\Http\Middleware;

use Closure;//agregar esta linea para que funcione bien y no lance un error
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/');//se cambia esta linea a / para que si no esta loqueado pueda redireccionar a la pagina de inicio
            }
        }

        return $next($request);
    }
}
