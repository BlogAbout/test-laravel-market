<?php

namespace App\Modules\Cart\Repositories;

class CartSessionRepository implements ICartRepository
{
    public function fetchAll()
    {
        $cart = session('cart');

        if ($cart) {
            return json_decode($cart, true);
        }

        return [];
    }

    public function store(array $cart)
    {
        session(['cart' => json_encode($cart)]);
    }

    public function delete(): void
    {
        session()->forget('cart');
    }
}
