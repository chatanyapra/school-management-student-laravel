<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebSessionSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('user_reg_no') && session()->has('user_class')) {
            // echo 'working 1';
            return $next($request); 
        } else {
            // $errorMessage= 'Your session has been expired! 1';
            // echo $errorMessage;
            return redirect('/');
        }
        
    }
}
