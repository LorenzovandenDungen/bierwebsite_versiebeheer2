<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bier;

class BierController extends Controller
{
    /**
     * Toon een boomweergave van alle bieren met hun onderliggende merken.
     */
    public function boom()
    {
        // Haal alle bieren op met hun recursieve submerken
        $bieren = Bier::with('childrenRecursive')->whereNull('valt_onder_id')->get();
        dd($bieren); // Debug output to check data retrieval
        
        // Return the view with the data
        return view('boom', compact('bieren'));
    }

    /**
     * Toon andere bieren van hetzelfde biermerk.
     */
    public function andereBieren($id)
    {
        // Haal het hoofdbier op op basis van ID en laad andere submerken
        $bier = Bier::with('siblings')->findOrFail($id);

        // Als er geen andere submerken zijn, retourneer dan een bericht
        if ($bier->siblings->isEmpty()) {
            return response()->json(['message' => 'Geen andere submerken gevonden voor dit bier.'], 404);
        }

        // Retourneer de view met de data
        return view('bieren.andere', compact('bier'));
    }

    /**
     * Toon bieren per categorie.
     */
    public function bierenPerCategorie($categorieId)
    {
        // Haal alle bieren op die tot de opgegeven categorie behoren
        $bieren = Bier::where('categorie_id', $categorieId)->get();

        // Retourneer een bericht als er geen bieren gevonden zijn
        if ($bieren->isEmpty()) {
            return response()->json(['message' => 'Geen bieren gevonden in deze categorie.'], 404);
        }

        // Retourneer de view met de data
        return view('bieren.per_categorie', compact('bieren'));
    }

    /**
     * Toon merken met submerken.
     */
    public function merkenMetSubmerken()
    {
        // Haal alle hoofdmerken op die submerken hebben
        $merken = Bier::has('submerken')->withCount('submerken')->get();

        // Retourneer een bericht als er geen hoofdmerken met submerken gevonden zijn
        if ($merken->isEmpty()) {
            return response()->json(['message' => 'Geen hoofdmerken met submerken gevonden.'], 404);
        }

        // Retourneer de view met de data
        return view('bieren.met_submerken', compact('merken'));
    }
}
