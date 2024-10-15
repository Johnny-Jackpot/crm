<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserHasRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        assert($user instanceof User);

        foreach ($roles as $role) {
            if (!$user->hasRole($role)) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}
