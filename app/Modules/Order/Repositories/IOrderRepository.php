<?php

namespace App\Modules\Order\Repositories;

interface IOrderRepository
{
    public function fetchAll();

    public function fetchByUserId(int $userId);

    public function fetchById(int $orderId);

    public function store(array $data);

    public function update(array $data, int $orderId);

    public function delete(int $orderId): void;
}
