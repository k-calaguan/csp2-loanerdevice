<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class IsAdmin
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
        if(Auth::user() == null) {
            Session::flash('status', 'Access denied.');
            Session::flash('alert-type', 'alert-danger');
            return redirect('/');
        } elseif(Auth::user()->is_admin != 1) {
            Session::flash('status', 'Access denied.');
            Session::flash('alert-type', 'alert-danger');
            return redirect('/dashboard');
        } else {
            return $next($request);
        }

    }
}
