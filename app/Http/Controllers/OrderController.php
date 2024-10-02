<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Modules\Cart\Repositories\ICartRepository;
use App\Modules\Order\OrderService;
use App\Modules\Order\Repositories\IOrderRepository;
use App\Modules\Product\Repositories\IProductRepository;

class OrderController extends Controller
{
    private OrderService $orderService;

    /**
     * ProductController constructor.
     *
     * @param \App\Modules\Order\Repositories\IOrderRepository $orderRepository
     * @param \App\Modules\Cart\Repositories\ICartRepository $cartRepository
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     */
    public function __construct(
        IOrderRepository $orderRepository,
        ICartRepository $cartRepository,
        IProductRepository $productRepository
    )
    {
        $this->orderService = new OrderService($orderRepository, $cartRepository, $productRepository);
    }

    public function index()
    {
        $orders = $this->orderService->index();

        $orders = OrderResource::collection($orders);

        return view('order.index', compact('orders'));
    }

    public function store()
    {
        $this->orderService->store();

        return redirect()->route('cart.index');
    }
}
