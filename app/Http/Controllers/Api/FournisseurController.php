<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fournisseur;
use App\Http\Requests\FournisseurStoreRequest;
use App\Http\Requests\FournisseurUpdateRequest;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Fournisseur::with('voyages')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FournisseurStoreRequest $request)
    {
        $validatedData = $request->validated();

        $fournisseur = Fournisseur::create($validatedData);

        return response()->json($fournisseur, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        return response()->json($fournisseur, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FournisseurUpdateRequest $request, Fournisseur $fournisseur)
    {
        $validatedData = $request->validated();

        $fournisseur->update($validatedData);

        return response()->json($fournisseur, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return response()->json(null, 204);
    }
}
