<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->hasRole('superadmin')) {
            return redirect('404');
        }

        return $next($request);
    }
}
