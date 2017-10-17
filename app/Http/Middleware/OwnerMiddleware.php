<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string $role
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect('/')->with('error_roles', 'You have not enough rights for operations');

        }
        return $next($request);
    }
}
