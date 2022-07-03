<?php

namespace App\Http\Middleware;

use App\Helpers\UserRoles;
use Closure;
use Illuminate\Http\Request;

class UserOrderMiddelware
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
        if (!isset(auth()->user()->role) || auth()->user()->role !== UserRoles::CLIENT) {
            return redirect()->route('manager');
        }
        return $next($request);
    }
}
