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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //https化
        \URL::forceScheme('https');
        //ペジネーションなどに対応させるため
        $this->app['request']->server->set('HTTPS','on');
    }
}
