<?php

namespace App\Http\Resources\V1\Customer;

use App\Http\Resources\V1\Order\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postalCode' => $this->postal_code,
            'ordersCount' =>  $this->whenLoaded('orders', function () {
                return $this->orders->count();
            }),
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
        ];
    }
}
