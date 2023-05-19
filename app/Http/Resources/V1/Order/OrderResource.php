<?php

namespace App\Http\Resources\V1\Order;

use App\Http\Resources\V1\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'customerId' => $this->customer_id,
            'details' => $this->details,
            'isFulFilled' => $this->is_fulfilled,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
        ];
    }
}
