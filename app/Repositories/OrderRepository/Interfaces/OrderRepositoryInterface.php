<?php

namespace App\Repositories\OrderRepository\Interfaces;

interface OrderRepositoryInterface
{
    public function getAllOrders($request);
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrder($orderDetails);
    public function updateOrder($orderId, $newDetails);
}
