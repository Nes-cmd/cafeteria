<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Activation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth()->user();
        if ($user->hasAnyRoles(['app_admin','cafe_admin'])) {
            return $next($request);
        }
        return redirect()->route('customer.activation.show');
    }
}
