<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('lastActivity')) {
            $lastActivity = Session::get('lastActivity');
            $sessionTimeout = config('session.lifetime') * 100; 
            // Session lifetime in seconds

            if (time() - $lastActivity > $sessionTimeout) {
                // Session has expired
                Session::flush(); // Clear the session data
                return redirect('/first-home-page');
            }
        }

        // Update the last activity timestamp
        // Session::put('lastActivity', time());

        return $next($request);
    }
}
