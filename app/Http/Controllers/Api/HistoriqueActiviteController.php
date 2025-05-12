<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoriqueActivite;

class HistoriqueActiviteController extends Controller
{
    public function index()
    {
        return response()->json(HistoriqueActivite::latest()->paginate(20));
    }
}
