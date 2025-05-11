<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class PaiementUpdateRequest extends BaseRequest
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
            'paiementable_type' => 'sometimes|string',
            'paiementable_id' => 'sometimes',
            'amount' => 'sometimes|numeric',
            'method' => 'sometimes|string',
        ];
    }

    public function messages(): array
    {
        return [
            'paiementable_type.string' => 'Le type doit être une chaîne de caractères',
            'amount.numeric' => 'Le montant doit être un nombre',
            'method.string' => 'Le type doit être une chaîne de caractères',
        ];
    }
}
