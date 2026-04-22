<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === 'admin') {
            abort(403, 'Unauthorized'); // Prevent admins from accessing user pages
        }
        return $next($request);
    }
}