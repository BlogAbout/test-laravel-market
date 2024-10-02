<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'cost' => $this->cost,
            'cost_old' => $this->cost_old,
            'author_id' => $this->author_id,
            'status' => $this->status,
            'in_stoke' => $this->in_stoke,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'receipt_at' => $this->receipt_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
