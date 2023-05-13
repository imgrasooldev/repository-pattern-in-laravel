<?php

namespace App\Repositories\OrderRepository;

use App\Filters\V1\OrdersFilter;
use App\Repositories\OrderRepository\Interfaces\OrderRepositoryInterface;
use App\Models\Order;


class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders($request)
    {
        $filter = new OrdersFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        return Order::where($filterItems);
    }

    public function getOrderById($order)
    {
        return $order;
    }

    public function createOrder($request)
    {
        return Order::create($request);
    }

    public function updateOrder($request, $order)
    {
        return $order->update($request);
    }

    public function deleteOrder($order)
    {
        $order->delete();
    }
}
