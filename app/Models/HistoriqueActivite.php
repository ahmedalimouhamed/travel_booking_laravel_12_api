<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueActivite extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
