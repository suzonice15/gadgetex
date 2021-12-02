<?php

namespace App\Http\Middleware;

use Closure;
 use Session;

class Admin
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
        if (Session::get('id')) {
            return $next($request);

        }

        return redirect('/admin/login')->with('error','Please Login First');

    }
}
