<?php

namespace App\Service\Order;

use App\AutoMapping;
use App\Entity\OrderEntity;
use App\Manager\Order\OrderManager;
use App\Request\Order\OrderCreateRequest;
use App\Response\Order\OrderCreateResponse;
use App\Service\OrderLog\OrderLogService;

class OrderService
{
    private AutoMapping $autoMapping;
    private OrderManager $orderManager;
    private OrderLogService $orderLogService;

    public function __construct(AutoMapping $autoMapping, OrderManager $orderManager, OrderLogService $orderLogService)
    {
        $this->autoMapping = $autoMapping;
        $this->orderManager = $orderManager;
        $this->orderLogService = $orderLogService;
    }

    public function createOrder(OrderCreateRequest $request)
    {
        $orderCreateResult = $this->orderManager->createOrder($request);

        if ($orderCreateResult) {
            // create order log
            $this->orderLogService->createOrderLog($orderCreateResult->getId(), $orderCreateResult->getCreatedByUserId());

            // return response
            return $this->autoMapping->map(OrderEntity::class, OrderCreateResponse::class, $orderCreateResult);
        }

        return $orderCreateResult;
    }
}
