<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avis;
use App\Http\Requests\AvisStoreRequest;
use App\Http\Requests\AvisUpdateRequest;
class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Avis::with('user', 'voyage')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvisStoreRequest $request)
    {
        $validatedData = $request->validated();

        $avis = Avis::create($validatedData);

        return response()->json($avis, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
        return response()->json($avis, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvisUpdateRequest $request, Avis $avis)
    {
        $validatedData = $request->validated();

        $avis->update($validatedData);

        return response()->json($avis, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        $avis->delete();

        return response()->json(null, 204);
    }
}
