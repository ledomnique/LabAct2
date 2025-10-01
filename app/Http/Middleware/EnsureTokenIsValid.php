<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check for a valid token in the request (e.g., query parameter or header)
        if($request->input('token') !== 'post-access') {
            // return redirect('/error')->with('error', 'Invalid token.');
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
