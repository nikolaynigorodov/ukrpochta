<?php

namespace App\Http\Middleware;

use App\Helpers\UserRoles;
use Closure;
use Illuminate\Http\Request;

class ManagerOrderMiddelware
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
        if (!isset(auth()->user()->role) || auth()->user()->role !== UserRoles::MANAGER) {
            return redirect()->route('order');
        }
        return $next($request);
    }
}
