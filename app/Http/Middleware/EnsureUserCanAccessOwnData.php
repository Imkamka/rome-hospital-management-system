<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanAccessOwnData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = $request->route('id');

        // Check if the authenticated user is accessing their own data
        if (auth()->check() && auth()->id() == $userId) {
            return $next($request);
        }

        // If not authorized, return an error response
        abort(403);
    }
}
