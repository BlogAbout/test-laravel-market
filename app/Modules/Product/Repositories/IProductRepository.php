<?php

namespace App\Modules\Product\Repositories;

interface IProductRepository
{
    public function fetchAll();

    public function fetchByFilter(array $filter);

    public function fetchById(int $productId);

    public function store(array $data);

    public function update(array $data, int $productId);

    public function delete(int $productId): void;
}
