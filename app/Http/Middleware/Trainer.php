<?php

namespace App\Http\Middleware;

use Closure;

class Trainer
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
        if(auth()->guard('trainer')->user()){
            return $next($request);
        }else{
            return redirect()->route('trainers.login');

        }

        return redirect('home')->with('error',"Only Trainer can access!");
    }
}
