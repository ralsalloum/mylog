<?php

namespace App\MessageHandler\Event;

use App\AutoMapping;
use App\Entity\OrderLogEntity;
use App\Message\Event\OrderCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateOrderLogHandler implements MessageHandlerInterface
{
    private AutoMapping $autoMapping;
    private EntityManagerInterface $entityManager;

    public function __construct(AutoMapping $autoMapping, EntityManagerInterface $entityManager)
    {
        $this->autoMapping = $autoMapping;
        $this->entityManager = $entityManager;
    }

    public function __invoke(OrderCreatedEvent $orderCreatedEvent)
    {
        $orderLog = $this->autoMapping->map(OrderCreatedEvent::class, OrderLogEntity::class, $orderCreatedEvent);

        $this->entityManager->persist($orderLog);
        $this->entityManager->flush();
    }
}
