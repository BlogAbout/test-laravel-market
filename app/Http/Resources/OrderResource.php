<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'tax' => $this->tax,
            'discount' => $this->discount,
            'sum' => $this->sum,
            'total' => $this->total,
            'delivery_id' => $this->delivery_id,
            'payment_id' => $this->payment_id,
            'status' => $this->status,
            'ordersItems' => OrderItemResource::collection($this->whenLoaded('ordersItems')),
            'paid_at' => $this->paid_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
