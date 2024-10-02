<?php

namespace App\Modules\Cart\Repositories;

interface ICartRepository
{
    public function fetchAll();

    public function store(array $cart);

    public function delete(): void;
}
