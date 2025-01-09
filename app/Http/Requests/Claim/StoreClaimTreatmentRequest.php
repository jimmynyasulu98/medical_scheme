<?php

namespace App\Http\Requests\Claim;

use Illuminate\Foundation\Http\FormRequest;

class StoreClaimTreatmentRequest extends FormRequest
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
            'claim_id' =>  ['integer', 'required'],
            'treatment_type' =>  ['string', 'required'],
            'description' =>  ['string', 'required'],
            'charge' =>  ['decimal:0,4', 'required'],
        ];
    }
}
