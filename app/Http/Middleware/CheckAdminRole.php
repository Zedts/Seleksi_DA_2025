<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        // Debug line - remove after testing
        \Log::info('User role:', ['role' => auth()->user()->role]);
        
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $user = auth()->user();
        if (!$user->role || $user->role->name !== 'admin') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
