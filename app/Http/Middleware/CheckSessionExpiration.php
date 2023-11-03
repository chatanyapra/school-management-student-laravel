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
            // echo 'working 2';
            $lastActivity = Session::get('lastActivity');
            $sessionTimeout = config('session.lifetime') * 60; // Session lifetime in seconds

            if (time() - $lastActivity > $sessionTimeout) {
                // Session has expired
                Session::flush(); // Clear the session data
                // echo 'nottttt work 2';
                return redirect()->route('session.expired');
            }
        }

        // Update the last activity timestamp
        // Session::put('lastActivity', time());

        return $next($request);
    }
}
