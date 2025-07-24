<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Stand;
use Illuminate\Http\JsonResponse;

class CommandeController extends Controller
{
    /**
     * Enregistre une nouvelle commande.
     */
    public function store(CommandeRequest $request): JsonResponse
    {
        // Récupère et valide les données
        $validated = $request->validated();

        // Vérifie que tous les produits appartiennent au stand spécifié
        $stand = Stand::findOrFail($validated['stand_id']);
        $produitIds = array_column($validated['details_commande'], 'id');
        
        // Vérifie que tous les produits existent et appartiennent au stand
        $produitsCount = Produit::whereIn('id', $produitIds)
            ->where('stand_id', $stand->id)
            ->count();

        if ($produitsCount !== count($produitIds)) {
            return response()->json([
                'message' => 'Certains produits n\'appartiennent pas au stand sélectionné'
            ], 422);
        }

        // Crée la commande
        $commande = Commande::create([
            'stand_id' => $validated['stand_id'],
            'details_commande' => $validated['details_commande'],
        ]);

        return response()->json([
            'message' => 'Commande créée avec succès',
            'commande' => $commande
        ], 201);
    }
} 