<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeLangWebMiddleware
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
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }
        return $next($request);    }
}
