<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Modules\Product\ProductService;
use App\Modules\Product\Repositories\IProductRepository;

class ProductController extends Controller
{
    private ProductService $productService;

    /**
     * ProductController constructor.
     *
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productService = new ProductService($productRepository);
    }

    public function index()
    {
        $products = $this->productService->index();

        $products = ProductResource::collection($products);

        return view('product.index', compact('products'));
    }

    public function show(int $productId)
    {
        $product = $this->productService->show($productId);

        $product = new ProductResource($product);

        return view('product.show', compact('product'));
    }
}
