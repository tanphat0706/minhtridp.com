<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                Session::flush();
                return redirect()->guest('login');
            }
        }

        $segments = $request->segments();
        if((empty($segments) || strpos($segments[0], 'frontend') === false) && auth()->user()->isCustomer()){
            return redirect()->route('frontend');
        }

        return $next($request);
    }
}
