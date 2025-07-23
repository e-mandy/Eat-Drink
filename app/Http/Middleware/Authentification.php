<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!User::where('email', $request->email)->exists()){
            abort(403, "Accès refusé - Vous n'êtes pas un entrepreneur pour accéder à cette page");
        }
        return $next($request);
    }
}
