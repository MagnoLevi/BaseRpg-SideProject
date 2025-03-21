<?php

namespace App\Providers;


use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class RateLimitingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Limitador para usuários autenticados
        RateLimiter::for('authenticated', function (Request $request) {
            return Limit::perSecond(1000)->by($request->user()->id ?: $request->ip());
        });

        // Limitador para usuários não autenticados
        RateLimiter::for('guest', function (Request $request) {
            return Limit::perSecond(100)->by($request->ip());
        });
    }
}
