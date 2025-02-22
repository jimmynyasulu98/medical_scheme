<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           /*  'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'email' => ['string', 'required'],
            'password' => ['string', 'required'],
            'membership_number' => ['string', 'required'], */
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'first_name cannot be blank'
        ];
    }
}
