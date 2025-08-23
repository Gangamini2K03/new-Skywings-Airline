<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // must be logged in AND have is_admin = true
        if (! $request->user() || ! (bool) $request->user()->is_admin) {
            // send non-admins to home (or wherever you want)
            return redirect()->route('home')->with('error', 'Admins only.');
        }

        return $next($request);
    }
}
