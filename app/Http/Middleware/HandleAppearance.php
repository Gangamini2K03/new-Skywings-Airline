<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleAppearance
{
    public function handle(Request $request, Closure $next)
    {
        // No-op: just continue the request. You can add theme logic here later.
        return $next($request);
    }
}
