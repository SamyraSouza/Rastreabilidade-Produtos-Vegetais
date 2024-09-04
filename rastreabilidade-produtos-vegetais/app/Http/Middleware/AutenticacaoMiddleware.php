<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (!$request->session()->has('autenticado')) {
            return redirect('/login')->with('msg', 'Você não está logado!');
        }

        return $next($request);

    }
}

