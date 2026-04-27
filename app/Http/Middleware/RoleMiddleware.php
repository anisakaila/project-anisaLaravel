<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        
        if (!auth()->check()) {
            abort(403);
        }

        if (!auth()->user()->role) {
            abort(403);
        }

        $userRole = auth()->user()->role->role_name;

        if (!in_array($userRole, $role)) {
            abort(403);
        }

        return $next($request);
    }
}