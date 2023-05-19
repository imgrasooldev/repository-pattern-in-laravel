<?php

namespace App\Repositories\OrderRepository;

use App\Filters\V1\OrdersFilter;
use App\Http\Resources\V1\Customer\CustomerResource;
use App\Repositories\OrderRepository\Interfaces\OrderRepositoryInterface;
use App\Models\Order;


class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders($request)
    {
        $filter = new OrdersFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeCustomer = $request->query('includeCustomer');

        $orders = Order::where($filterItems);

        if ($includeCustomer) {
            $orders = $orders->with('customer');
        }

        return $orders;
    }

    public function getOrderById($request, $order)
    {
        $includeCustomer = $request->query('includeCustomer');

        if ($includeCustomer) {
            return new CustomerResource($order->loadMissing('customer'));
        }

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
