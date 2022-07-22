<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Candidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'employer'){
            return redirect()->route('employer');
        }
        if (Auth::user()->role == 'candidate') {
            return $next($request);
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }

    }
}
