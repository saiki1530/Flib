<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Quantri
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->idgroup == 1) {
            return $next($request);
        } else return redirect('');
    }
}
