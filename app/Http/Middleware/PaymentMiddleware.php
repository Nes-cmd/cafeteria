<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Alert;
class PaymentMiddleware
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

        $user = Auth::user();
        if (!Auth::check()) {
            return redirect()->route('/login');
        }
        elseif ($user->role == '1') {
            return $next($request);
        }
        elseif ($user->role == '0') {
            Alert::error('Acces denied','You dont have permition to access this page');
            return back();
            return 'test';
        }
        return back();
    }
}
