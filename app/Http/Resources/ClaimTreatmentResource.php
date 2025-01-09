<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClaimTreatmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return   [
            'id' => $this->id,
            'claim_id' =>  $request->claim_id,
            'treatment_type' =>  $request->treatment_type,
            'description' =>  $request->description,
            'charge' =>  $request->charge,
        ];
    }
}
