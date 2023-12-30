<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Preuser;
use App\Observers\PreuserObserver;

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
        Preuser::observe(PreuserObserver::class);
    }
}
