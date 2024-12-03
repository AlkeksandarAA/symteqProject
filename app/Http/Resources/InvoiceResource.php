<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Client;
use App\Models\Object;

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
            "id" => $this->id,
            'invoice_number' => $this->invoice_number,
            'due_date' => $this->due_date,
            'total_amount' => $this->total_amount,
            'client_id' => Client::findOrFail($this->client_id),
            'item_id' => Object::findOrFail($this->item_id),
        ];
    }
}
