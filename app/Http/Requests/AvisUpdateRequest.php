<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class AvisUpdateRequest extends BaseRequest
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
            'rating' => 'sometimes|integer',
            'comment' => 'sometimes|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.exists' => 'L\'utilisateur est obligatoire',
            'voyage_id.exists' => 'Le voyage est obligatoire',
            'rating.integer' => 'Le note est obligatoire',
            'comment.string' => 'Le commentaire est obligatoire',
        ];
    }
}
