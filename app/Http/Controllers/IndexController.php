<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Modules\Product\ProductService;
use App\Modules\Product\Repositories\IProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, IProductRepository $productRepository): View
    {
        $products = (new ProductService($productRepository))->index();

        $products = ProductResource::collection($products);

        return view('index', compact('products'));
    }
}
