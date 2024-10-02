<?php

namespace App\Modules\Cart;

use App\Http\Resources\ProductResource;
use App\Modules\Cart\Repositories\ICartRepository;
use App\Modules\Product\Repositories\IProductRepository;

class CartService
{
    private ICartRepository $cartRepository;
    private IProductRepository $productRepository;

    /**
     * ProductController constructor.
     *
     * @param \App\Modules\Cart\Repositories\ICartRepository $cartRepository
     * @param \App\Modules\Product\Repositories\IProductRepository $productRepository
     */
    public function __construct(ICartRepository $cartRepository, IProductRepository $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Получение списка товаров и данных корзины
     *
     * @return array[]
     */
    public function fetchList(): array
    {
        $result = [
            'products' => [],
            'cart' => $this->cartRepository->fetchAll()
        ];

        $productIds = [];
        foreach ($result['cart'] as $productId => $qty) {
            array_push($productIds, $productId);
        }

        if (count($productIds)) {
            $products = $this->productRepository->fetchByFilter(['id' => $productIds]);

            $result['products'] = ProductResource::collection($products);
        }

        return $result;
    }

    /**
     * Добавление товара в корзину или изменение его количества в корзине
     *
     * @param int $productId Идентификатор товара
     * @param int|null $qty Количество товара для обновления в корзине
     * @return \App\Modules\Cart\CartService
     */
    public function add(int $productId, ?int $qty = null): self
    {
        $cart = $this->cartRepository->fetchAll();

        if (isset($cart[$productId])) {
            $cart[$productId] = $qty ? $cart[$productId] = $qty : $cart[$productId] += $qty;
        } else {
            $cart[$productId] = $qty;
        }

        $this->cartRepository->store($cart);

        session()->flash('success', 'Товар добавлен в корзину');

        return $this;
    }

    /**
     * Удаление товара из корзины
     *
     * @param int $productId Идентификатор товара
     * @return \App\Modules\Cart\CartService
     */
    public function remove(int $productId): self
    {
        $cart = $this->cartRepository->fetchAll();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        $this->cartRepository->store($cart);

        session()->flash('warning', 'Товар удален в корзину');

        return $this;
    }

    /**
     * Очистка корзины
     */
    public function clear(): void
    {
        $this->cartRepository->delete();
    }
}
