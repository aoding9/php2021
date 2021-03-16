<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;

class RbacCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      // dd('2');
      // dump(Route::current());
      // dump($request->path());
    // dump($request->path());
      dd(Route::is('auth/index/*/*'));
      // dd(Route::currentRouteName());
      // dd(Route::currentRouteAction());
      // dd($request);
        return $next($request);
    }
}
