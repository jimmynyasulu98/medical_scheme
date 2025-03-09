<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWithDependantsResource extends JsonResource
{
    /**
     * Transform the resource into an array of items in the jsonResponse.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'membership_number' => $this->membership_number,
            'is_principal_member' => $this->is_principal_member,
            'dependants' => $this->dependants_to_json()
        ];
    }
}
