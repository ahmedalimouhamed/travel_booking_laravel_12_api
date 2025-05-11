<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class VoyageUpdateRequest extends BaseRequest
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
            'destination' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'fournisseur_id' => 'sometimes|exists:fournisseurs,id',
            'stock' => 'sometimes|integer',
            'tags' => 'sometimes|array',
            'tags.*' => 'exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [
            'destination.required' => 'Le nom est obligatoire',
            'description.required' => 'L\'email est obligatoire',
            'price.required' => 'Le prix est obligatoire',
            'fournisseur_id.required' => 'Le fournisseur est obligatoire',
            'stock.required' => 'Le stock est obligatoire',
            'tags.exists' => 'Le tag n\'existe pas',
            'tags.array' => 'Les tags doivent être un tableau',
            'tags.*' => 'Les tags doivent être des entiers',
        ];
    }
}
