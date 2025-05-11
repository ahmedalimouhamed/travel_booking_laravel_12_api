<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Paiement;
use App\Observers\PaiementObserver;

class EventServiceProvider extends ServiceProvider
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
        Paiement::observe(PaiementObserver::class);
    }
}
