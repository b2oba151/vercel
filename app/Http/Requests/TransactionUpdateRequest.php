<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'vers' => ['required', 'in:mali,maroc'],
            'prenom' => ['nullable', 'max:255', 'string'],
            'envoye' => ['required', 'numeric'],
            'nom' => ['nullable', 'max:255', 'string'],
            'recu' => ['nullable', 'numeric'],
            'frais' => ['required', 'numeric'],
            'taux' => ['required', 'numeric'],
            'charges' => ['nullable', 'numeric'],
            'statut' => ['nullable', 'in:effectue,attente,annulle'],
            'description' => ['nullable', 'max:255', 'string'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
