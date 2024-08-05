<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return Auth::user()
        ->isAdmin() 
        ? $next($request) 
        : redirect()
            ->route('auth.login')
            ->with('error', 'Bạn cần đăng nhập để có thể vào admin');
    }
}
