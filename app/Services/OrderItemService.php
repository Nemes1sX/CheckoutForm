<?php


namespace App\Services;

use App\Models\Order;


class OrderItemService
{
    public function create(Order $order, array $orderItems)
    {
        $order->orderItems()->createMany($orderItems);
    }
}
