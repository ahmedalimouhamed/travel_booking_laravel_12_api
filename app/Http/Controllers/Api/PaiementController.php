<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use App\Http\Requests\PaiementStoreRequest;
use App\Http\Requests\PaiementUpdateRequest;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Paiement::with('paiementable')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaiementStoreRequest $request)
    {
        $validatedData = $request->validated();

        try {
            // Trouver le modèle paiementable
            $paiementable = $validatedData['paiementable_type']::find($validatedData['paiementable_id']);
            
            if (!$paiementable) {
                return response()->json([
                    'message' => 'Le modèle associé au paiement n\'a pas été trouvé'
                ], 404);
            }

            // Créer le paiement
            $paiement = Paiement::create([
                'paiementable_type' => $validatedData['paiementable_type'],
                'paiementable_id' => $validatedData['paiementable_id'],
                'amount' => $validatedData['amount'],
                'method' => $validatedData['method'],
            ]);

            // Associer le paiement au modèle paiementable
            $paiementable->paiements()->save($paiement);

            return response()->json([
                'message' => 'Paiement créé avec succès',
                'data' => $paiement
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la création du paiement',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        return response()->json($paiement, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaiementUpdateRequest $request, Paiement $paiement)
    {
        $validatedData = $request->validated();

        $paiement->update($validatedData);

        return response()->json($paiement, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();

        return response()->json(null, 204);
    }
}
