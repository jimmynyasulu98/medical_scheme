<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'date' => $this->date,
            'approved' => $this->approved,
            'settled' => $this->settled,
            'submitted' => $this->settled,
            'total' => $this->total,
            'date_paid' => $this->date_paid,
            'service_provider' => [
                'id' => $this->service_provider_id,
                'short_name' => $this->service_provider->title,
                'full_name' => $this->service_provider->title,

            ],
            'claims' =>  ClaimResource::collection($this->claims),
        ];
    }
}
