<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Notifications\VoyageEpuise;
use App\Notifications\NouveauVoyage;

class VoyageObserver extends GenericObserver
{
    public function created(Model $voyage): void
    {
        parent::created($voyage);

        User::where('role', 'client')->each(function ($user) use ($voyage) {
            $user->notify(new NouveauVoyage($voyage));
        });
    }

    public function updated(Model $voyage): void
    {
        parent::updated($voyage);

        if($voyage->stock === 0 && $voyage->getOriginal('stock') > 0){
            User::where('role', 'admin')->each(function ($user) use ($voyage) {
                $user->notify(new VoyageEpuise($voyage));
            });
        }
    }
}
