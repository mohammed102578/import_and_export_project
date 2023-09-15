<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $navColor='#000';
        $oldColor='#445ede';
        $newColor='#ab182d';
        $url=asset('public') . '/';
        if ( request()->getHttpHost()=='localhost') {
            $url = asset('public') . '/';
        }
        view()->share(['url'=>$url,'newColor'=>$newColor]);
    }
}
