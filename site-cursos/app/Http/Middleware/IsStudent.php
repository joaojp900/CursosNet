<?php

namespace App\Http\Middleware;

use Closure;
 
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (Auth::check() && Auth::user()->role === 'student') {
        return $next($request);
    }

        return redirect('/home')->with('error', 'Acesso negado. Apenas estudantes Logados podem acessar');
         
    }
}
