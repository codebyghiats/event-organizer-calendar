<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureFamilyMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next)
{
    if (!Auth::check()) {
        abort(403);
    }

    if (!Auth::user()->family_id) {
        abort(403, 'No family assigned.');
    }

    return $next($request);
}
}
