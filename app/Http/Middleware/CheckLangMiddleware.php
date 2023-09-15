<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        app()->setLocale('en');
        if( $request->header('lang')== 'ar'){
            app()->setLocale('ar');
        }
        return $next($request);
    }
}
