<?php

namespace App\Http\Middleware\My;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Manager
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
        if(Auth::user()->role_id >= 2) {
            return $next($request);
        } else {
            return redirect('/posts');
        }
    }
}
