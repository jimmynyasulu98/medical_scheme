<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
            'user_id' => $this->user_id,
            'invoice_id' => $this->invoice_id,
            'approved' => $this->approved,
            'settled' => $this->settled,
            'total' => $this->sub_total,
            'claim_treatments' => $this->claim_treatments
        ];
    }
}
