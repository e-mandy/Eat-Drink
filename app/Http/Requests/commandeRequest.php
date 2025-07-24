<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Accessible à tous les visiteurs
    }

    /**
     * Obtient les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'stand_id' => ['required', 'exists:stands,id'],
            'details_commande' => ['required', 'array', 'min:1'],
            'details_commande.*.id' => ['required', 'exists:produits,id'],
            'details_commande.*.nom' => ['required', 'string'],
            'details_commande.*.quantite' => ['required', 'integer', 'min:1'],
            'details_commande.*.prix_unitaire' => ['required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Obtient les messages d'erreur personnalisés pour les règles de validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'stand_id.required' => 'Le stand est obligatoire',
            'stand_id.exists' => 'Le stand sélectionné n\'existe pas',
            'details_commande.required' => 'Les détails de la commande sont obligatoires',
            'details_commande.array' => 'Les détails de la commande doivent être un tableau',
            'details_commande.min' => 'La commande doit contenir au moins un produit',
            'details_commande.*.id.required' => 'L\'ID du produit est obligatoire',
            'details_commande.*.id.exists' => 'Un des produits sélectionnés n\'existe pas',
            'details_commande.*.nom.required' => 'Le nom du produit est obligatoire',
            'details_commande.*.nom.string' => 'Le nom du produit doit être une chaîne de caractères',
            'details_commande.*.quantite.required' => 'La quantité est obligatoire',
            'details_commande.*.quantite.integer' => 'La quantité doit être un nombre entier',
            'details_commande.*.quantite.min' => 'La quantité doit être supérieure à 0',
            'details_commande.*.prix_unitaire.required' => 'Le prix unitaire est obligatoire',
            'details_commande.*.prix_unitaire.numeric' => 'Le prix unitaire doit être un nombre',
            'details_commande.*.prix_unitaire.min' => 'Le prix unitaire doit être supérieur ou égal à 0',
        ];
    }
} 