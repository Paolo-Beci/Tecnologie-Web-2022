<?php

namespace App\Http\Middleware\Authentication;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsLocatore
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
        if(!Auth::check()){
            dd("NESSUN LOGIN");
        }

        $user = Auth::user();
        dd($user);
        if($user == null || !$user->hasRole('locatore')){
            return redirect('/');
        }

        return $next($request);
    }
}
