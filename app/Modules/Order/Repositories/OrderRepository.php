<?php

namespace App\Modules\Order\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderRepository implements IOrderRepository
{
    public function fetchAll()
    {
        return Order::all();
    }

    public function fetchByUserId(int $userId)
    {
        return Order::query()
            ->where('user_id', $userId)
            ->get();
    }

    public function fetchById(int $orderId)
    {
        return Order::with(['ordersItems' => function ($query) {
            $query::with(['product']);
        }])->findOrFail($orderId);
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            $order = new Order;
            $order->fill($data)->save();

            $orderId = $order->id;

            foreach ($data['items'] as &$item) {
                $item['order_id'] = $orderId;
            }

            OrderItem::insert($data['items']);

            DB::commit();

            $order->fresh();

            return $order;
        } catch (Exception $e) {
            DB::rollBack();

            return [];
        }
    }

    public function update(array $data, int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $order->update($data);

        return $this->fetchById($order->id);
    }

    public function delete(int $orderId): void
    {
        Order::destroy($orderId);
    }
}
