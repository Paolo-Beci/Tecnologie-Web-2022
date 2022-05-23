<?php

namespace App\Http\Middleware\Authentication;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsLocatario
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
        if($user == null || !$user->hasRole('locatario')){
            return redirect('/');
        }

        return $next($request);
    }
}
