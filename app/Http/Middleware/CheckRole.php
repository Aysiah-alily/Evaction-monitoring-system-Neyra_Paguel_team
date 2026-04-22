<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Usage: ->middleware('role:admin') or ->middleware('role:evacuation_admin,barangay_admin')
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (! Auth::check()) {
            $allowed = array_map('trim', explode(',', $roles));
            if (in_array('evacuation_admin', $allowed)) {
                return redirect()->route('login.evacuation');
            } elseif (in_array('admin', $allowed)) {
                return redirect()->route('login.admin');
            } elseif (in_array('barangay_admin', $allowed)) {
                return redirect()->route('login.barangay');
            } else {
                return redirect()->route('login');
            }
        }

        $allowed = array_map('trim', explode(',', $roles));
        if (! in_array(Auth::user()->role, $allowed, true)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'evacuation_admin') {
                return redirect()->route('EvacAdmin.dashboard');
            } elseif ($user->role === 'barangay_admin') {
                return redirect()->route('barangay.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}