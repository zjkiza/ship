<?php

namespace App\Providers;

use App\Models\Craw;
use App\Observers\CrawObserver;
use Illuminate\Support\ServiceProvider;

class CrawObserverProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Craw::observe(CrawObserver::class);
    }
}
