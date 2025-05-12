<?php

namespace App\Observers;

use App\Notifications\PaiementEffectue;
use Illuminate\Database\Eloquent\Model;

class PaiementObserver extends GenericObserver
{
    public function created(Model $paiement): void
    {
        parent::created($paiement);

        if($user = $paiement->paiementable->user ?? null){
            $user->notify(new PaiementEffectue($paiement));
        }
    }
}
