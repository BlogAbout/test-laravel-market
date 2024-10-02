<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'qty' => $this->qty,
            'cost' => $this->cost,
            'sum' => $this->sum,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
