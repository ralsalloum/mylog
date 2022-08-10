<?php

namespace App\Manager\Order;

use App\AutoMapping;
use App\Entity\OrderEntity;
use App\Request\Order\OrderCreateRequest;
use Doctrine\ORM\EntityManagerInterface;

class OrderManager
{
    private AutoMapping $autoMapping;
    private EntityManagerInterface $entityManager;

    public function __construct(AutoMapping $autoMapping, EntityManagerInterface $entityManager)
    {
        $this->autoMapping = $autoMapping;
        $this->entityManager = $entityManager;
    }

    public function createOrder(OrderCreateRequest $request): OrderEntity
    {
        $orderEntity = $this->autoMapping->map(OrderCreateRequest::class, OrderEntity::class, $request);

        $this->entityManager->persist($orderEntity);
        $this->entityManager->flush();

        return $orderEntity;
    }
}
