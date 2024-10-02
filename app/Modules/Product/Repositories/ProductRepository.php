<?php

namespace App\Modules\Product\Repositories;

use App\Models\Product;

class ProductRepository implements IProductRepository
{
    public function fetchAll()
    {
        return Product::all();
    }

    public function fetchByFilter(array $filter)
    {
        return Product::query()
            ->when(isset($filter['id']), function ($query) use ($filter) {
                $query->whereIn('id', $filter['id']);
            })
            ->get();
    }

    public function fetchById(int $productId)
    {
        return Product::findOrFail($productId);
    }

    public function store(array $data)
    {
        $product = new Product;
        $product->fill($data)->save();

        return $this->fetchById($product->id);
    }

    public function update(array $data, int $productId)
    {
        $product = Product::findOrFail($productId);

        $product->update($data);

        return $this->fetchById($product->id);
    }

    public function delete(int $productId): void
    {
        Product::destroy($productId);
    }
}
