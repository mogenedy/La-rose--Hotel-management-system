<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        //$role variable contains admin and user roles ..$role could be any role that you want to check against.
        // if(Auth::user()->role !== $role) {
        //     return redirect('dashboard');
        // }
        //if (!Auth::user()->hasRole('admin'))
        if(Auth::user()->role !== 'admin') {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
