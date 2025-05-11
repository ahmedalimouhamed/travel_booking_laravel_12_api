<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoyageStoreRequest;
use App\Http\Requests\VoyageUpdateRequest;
use App\Models\Voyage;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Voyage::with('tags', 'fournisseur')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoyageStoreRequest $request)
    {
        $validatedData = $request->validated();

        $voyage = Voyage::create([
            'destination' => $validatedData['destination'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'fournisseur_id' => $validatedData['fournisseur_id'],
            'stock' => $validatedData['stock']
        ]);

        $tags = $validatedData['tags'] || [];

        $voyage->tags()->sync($validatedData['tags'] || []);

        return response()->json($voyage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Voyage $voyage)
    {
        return response()->json($voyage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoyageUpdateRequest $request, Voyage $voyage)
    {
        $validatedData = $request->validated();

        $voyage->update([
            'destination' => $validatedData['destination'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'fournisseur_id' => $validatedData['fournisseur_id'],
            'stock' => $validatedData['stock']
        ]);

        if($validatedData['tags']) {
            $voyage->tags()->sync($validatedData['tags']);
        }

        return response()->json($voyage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voyage $voyage)
    {
        $voyage->delete();

        return response()->json(null, 204);
    }
}
