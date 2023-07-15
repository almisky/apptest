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
        if ($request->session()->has('user_id')) {

            $role = session('role');

            if ($role == 1) { //admin
                return redirect(route('product'));
            } else if ($role == 2) { //user
                return redirect(route('profile'));
            } else {
                return redirect(route('loginform'));
            }
            return redirect(route('loginform'));
        }
    }
}
