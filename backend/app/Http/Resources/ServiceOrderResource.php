<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceOrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'client_id' => $this->client_id,
            'vehicle_id' => $this->vehicle_id,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'estimated_date' => $this->estimated_date,
            'completion_date' => $this->completion_date,
            'total_value' => $this->total_value,
            'payment_status' => $this->payment_status,
            'client' => $this->whenLoaded('client'),
            'vehicle' => $this->whenLoaded('vehicle'),
            'user' => $this->whenLoaded('user'),
            'items' => $this->whenLoaded('items'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
