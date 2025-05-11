<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class PaiementStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paiementable_type' => 'required|string',
            'paiementable_id' => 'required',
            'amount' => 'required|numeric',
            'method' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'paiementable_type.required' => 'Le type est obligatoire',
            'paiementable_id.required' => 'L\'id est obligatoire',
            'amount.required' => 'Le montant est obligatoire',
            'method.required' => 'Le type est obligatoire',
        ];
    }
}
