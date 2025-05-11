<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = [
        'user_id',
        'voyage_id',
        'rating',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}
