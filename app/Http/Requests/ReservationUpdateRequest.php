<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class ReservationUpdateRequest extends BaseRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'voyage_id' => 'sometimes|exists:voyages,id',
            'places' => 'sometimes|integer',
            'status' => 'sometimes|in:pending,confirmed,canceled',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'L\'utilisateur est obligatoire',
            'voyage_id.exists' => 'Le voyage est obligatoire',
            'places.integer' => 'Le nombre de places doit être un entier',
            'status.in' => 'Le statut doit être une chaîne de caractères',
        ];
    }
}
