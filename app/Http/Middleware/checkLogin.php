<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\MessageBag;

class checkLogin
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
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level > 0) {
                return $next($request);
            } else {
                return redirect('login')->with('error', 'You dont have permission to login !!!');
            }
        } else {
            return redirect('login');
        }
    }
}
