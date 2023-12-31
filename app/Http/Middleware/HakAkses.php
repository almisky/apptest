<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HakAkses
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
        if (!$request->session()->has('user_id')) {
            return redirect('/auth/login-form');
            // return  redirect('/');
            // exit('masuk');
        }
        return $next($request);

        // return redirect(route('auth.loginform'));
    }
}
