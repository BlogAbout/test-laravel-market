<?php

namespace App\Modules\Order;

use App\Modules\Cart\CartService;
use App\Modules\Cart\Repositories\ICartRepository;
use App\Modules\Order\Repositories\IOrderRepository;
use App\Modules\Product\ProductService;
use App\Modules\Product\Repositories\IProductRepository;

class OrderService
{
    private IOrderRepository $orderRepository;
    private ProductService $productService;
    private CartService $cartService;

    /**
     * OrderService constructor.
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
        $this->orderRepository = $orderRepository;
        $this->productService = new ProductService($productRepository);
        $this->cartService = new CartService($cartRepository, $productRepository);
    }

    public function index()
    {
        return $this->orderRepository->fetchAll();
    }

    public function store()
    {
        $cart = $this->cartService->fetchList();
        $items = [];
        $total = 0;

        foreach ($cart['products'] as $product) {
            $qty = $cart['cart'][$product['id']];
            $sum = $qty * $product['cost'];
            $total += $sum;

            array_push($items, [
                'order_id' => null,
                'product_id' => $product['id'],
                'qty' => $qty,
                'cost' => $product['cost'],
                'sum' => $sum,
            ]);
        }

        $data = [
            'sum' => $total,
            'total' => $total,
            'status' => 'new',
            'items' => $items
        ];

        $order = $this->orderRepository->store($data);

        $this->cartService->clear();

        session()->flash('success', 'Ваш заказ успешно оформлен');

        return $order;
    }
}
