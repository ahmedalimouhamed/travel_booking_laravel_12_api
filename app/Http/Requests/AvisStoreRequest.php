<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class AvisStoreRequest extends BaseRequest
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
            'user_id' => 'required|exists:users,id',
            'voyage_id' => 'required|exists:voyages,id',
            'rating' => 'required|integer',
            'comment' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'L\'utilisateur est obligatoire',
            'voyage_id.required' => 'Le voyage est obligatoire',
            'rating.required' => 'Le note est obligatoire',
            'comment.required' => 'Le commentaire est obligatoire',
        ];
    }
}
