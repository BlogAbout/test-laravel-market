<?php

namespace App\Modules\Product;

use App\Modules\Product\Repositories\IProductRepository;

class ProductService
{
    private IProductRepository $productRepository;

    /**
     * ProductController constructor.
     *
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->fetchAll();
    }

    public function show(int $productId)
    {
        return $this->productRepository->fetchById($productId);
    }
}
