<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
<<<<<<< HEAD
            return redirect(RouteServiceProvider::HOME);
=======
            return redirect('/');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $next($request);
    }
}
