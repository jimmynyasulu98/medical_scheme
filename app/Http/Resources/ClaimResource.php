<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\ClaimTreatmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClaimResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'member' => new UserResource($this->user),
            'invoice_id' => $this->invoice_id,
            'approved' => $this->approved,
            'settled' => $this->settled,
            'sub_total' => $this->sub_total,
            'claim_treatments' => ClaimTreatmentResource::collection( $this->claim_treatments),
        ];
    }
}
