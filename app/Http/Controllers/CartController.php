<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreRequest;
use App\Modules\Cart\CartService;
use App\Modules\Cart\Repositories\ICartRepository;
use App\Modules\Product\Repositories\IProductRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartService $cartService;

    /**
     * ProductController constructor.
     *
     * @param \App\Modules\Cart\Repositories\ICartRepository $cartRepository
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     */
    public function __construct(
        ICartRepository $cartRepository,
        IProductRepository $productRepository
    )
    {
        $this->cartService = new CartService($cartRepository, $productRepository);
    }

    public function index()
    {
        $cart = $this->cartService->fetchList();

        return view('cart.index', compact('cart'));
    }

    public function add(StoreRequest $request)
    {
        $data = $request->validated();

        $productId = $data['productId'];
        $qty = $data['qty'];

        $this->cartService->add($productId, $qty ?? null);

        return redirect()->route('cart.index');
    }

    public function remove(int $productId)
    {
        $this->cartService->remove($productId);

        return redirect()->route('cart.index');
    }
}
