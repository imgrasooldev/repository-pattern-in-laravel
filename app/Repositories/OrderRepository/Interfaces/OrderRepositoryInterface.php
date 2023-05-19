<?php

namespace App\Repositories\OrderRepository\Interfaces;

interface OrderRepositoryInterface
{
    public function getAllOrders($request);
    public function getOrderById($request, $order);
    public function deleteOrder($order);
    public function createOrder($request);
    public function updateOrder($request, $order);
}
