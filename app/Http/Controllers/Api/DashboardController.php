<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voyage;
use App\Models\Reservation;
use App\Models\Paiement;
use App\Models\Avis;
use App\Models\Tag;
use App\Models\Fournisseur;

class DashboardController extends Controller
{
    public function stats()
    {
        return response()->json([
            'users' => User::count(),
            'voyages' => Voyage::count(),
            'reservations' => Reservation::count(),
            'paiements' => Paiement::count(),
            'total_paiements' => Paiement::sum('amount'),
            'top_destinations' => Voyage::withCount('reservations')->orderBy('reservations_count', 'desc')->take(5)->get(),
            'avis' => Avis::count(),
            'tags' => Tag::count(),
            'fournisseurs' => Fournisseur::count(),
        ], 200);
    }
}
