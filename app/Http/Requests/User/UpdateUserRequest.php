<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        return [
            'first_name' => ['string'],
            'last_name' => ['string'],
            'email' => ['string'],
            'password' => ['string'],
            'membership_number' => ['string'],
        ];
    
    }

    public function messages(){
        return [
            'first_name.string' => 'first_name must be a string'
        ];
    }
}
