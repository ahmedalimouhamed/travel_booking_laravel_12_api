<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }
}
