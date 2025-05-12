<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Paiement;
use App\Observers\PaiementObserver;
use App\Models\Voyage;
use App\Observers\VoyageObserver;
use App\Models\Avis;
use App\Observers\GenericObserver;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Fournisseur;
use App\Models\Tag;

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
        Voyage::observe(VoyageObserver::class);

        Avis::observe(GenericObserver::class);
        Reservation::observe(GenericObserver::class);
        User::observe(GenericObserver::class);
        Fournisseur::observe(GenericObserver::class);
        Tag::observe(GenericObserver::class);
    }
}
