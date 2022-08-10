<?php

namespace App\Service\OrderLog;

use App\Message\Event\OrderCreatedEvent;
use Symfony\Component\Messenger\MessageBusInterface;

class OrderLogService
{
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function createOrderLog(int $orderId, int $createdByUserId)
    {
        $orderCreatedEvent = new OrderCreatedEvent();

        $orderCreatedEvent->setOrderId($orderId);
        $orderCreatedEvent->setCreatedByUserId($createdByUserId);

        $this->eventBus->dispatch($orderCreatedEvent);
    }
}
