<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'paiementable_type',
        'paiementable_id',
        'amount',
        'method',
    ];

    public function paiementable()
    {
        return $this->morphTo();
    }
}
