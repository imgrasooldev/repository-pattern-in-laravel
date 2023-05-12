<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\{StoreOrderRequest, UpdateOrderRequest};
use App\Http\Resources\V1\{OrderCollection, OrderResource};
use App\Models\Order;
use App\Repositories\OrderRepository\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\{Request, JsonResponse};
// use Illuminate\Http\;

class OrderController extends BaseController
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $orders = $this->orderRepository->getAllOrders($request);
        $success = new OrderCollection($orders->paginate()->appends($request->query()));
        return $this->sendResponse($success, 'Orders retrieved successfully.');
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        $success = new OrderResource($this->orderRepository->createOrder($request->all()));
        return $this->sendResponse($success, 'Order stored successfully.');
    }

    public function show(Order $order): JsonResponse
    {
        $success = new OrderResource($this->orderRepository->getOrderById($order));
        return $this->sendResponse($success, 'Order retrieved successfully.');
    }

    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        $this->orderRepository->updateOrder($request->all(), $order);
        $success = new OrderResource($order);
        return $this->sendResponse($success, 'Order updated successfully.');
    }

    public function destroy(Order $order): JsonResponse
    {
        $this->orderRepository->deleteOrder($order);
        return $this->sendResponse([], 'Order deleted successfully.');
    }
}
