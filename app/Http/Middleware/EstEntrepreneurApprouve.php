<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstEntrepreneurApprouve
{
    /**
     * Vérifie si l'utilisateur est un entrepreneur approuvé.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->estEntrepreneurApprouve()) {
            return response()->json([
                'message' => 'Accès non autorisé. Seuls les entrepreneurs approuvés peuvent accéder à cette ressource.'
            ], 403);
        }

        return $next($request);
    }
} 