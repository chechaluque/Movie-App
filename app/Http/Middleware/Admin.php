<?php

namespace Cinema\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;// agregagar esta linea para que trabaje
use Session;//agregar esta linea para las sesiones
use Closure;
class Admin
{
    protected $auth; //creamos una variable primero y luego el constructor

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->id != 10){
            Session::flash('message-error', 'Usted no tiene privilegios de administrador');
            return redirect()->to('admin');
        }
        return $next($request);
    }
}
