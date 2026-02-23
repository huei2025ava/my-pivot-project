<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; 
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 只有在非本地端（即 Railway 雲端）才強制使用 HTTPS
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}