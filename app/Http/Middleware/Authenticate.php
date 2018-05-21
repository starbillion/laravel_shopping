<?php

namespace Illuminate\Auth\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    public function handle($request, Closure $next,$guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson() ){
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('sign-in');
            }   
        }
        return $next($request);
    }
}
