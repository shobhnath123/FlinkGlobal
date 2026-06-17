<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->force_password_change && $user->hasAnyRole(['user', 'Sales Agent'])) {
                $allowedRoutes = [
                    'admin.password.change.form',
                    'admin.password.change.store',
                    'admin.logout',
                ];

                if (!in_array($request->route()->getName(), $allowedRoutes)) {
                    return redirect()->route('admin.password.change.form')
                                     ->with('warning', 'Please change your password before proceeding.');
                }
            }
        }

        return $next($request);
    }
}
