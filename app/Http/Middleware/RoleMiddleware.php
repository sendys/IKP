<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /* public function handle(Request $request, Closure $next, $role)
    {

        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect jika role tidak sesuai
        return redirect('/login');
    } */

    public function handle(Request $request, Closure $next, $role)
    {
        // Jika pengguna belum login, arahkan ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Jika pengguna sudah login tetapi rolenya tidak sesuai, bisa diarahkan ke halaman lain atau forbidden
        if (Auth::user()->role !== $role) {
            //return abort(403, 'Unauthorized');
            abort(404);
        }

        return $next($request);
    }

}
