<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserTipo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
    public function handle(Request $request, Closure $next, $tipo)
{
    if ($request->user()->tipo !== $tipo) {
        abort(403, 'Acesso negado');
    }
    return $next($request);
}

}
