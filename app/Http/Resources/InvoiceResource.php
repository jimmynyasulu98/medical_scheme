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
            'approved' => $this->approved,
            'settled' => $this->settled,
            'total' => $this->total,
            'date_paid' => $this->date_paid,
            'claims' => $this->claims
        ];
    }
}
