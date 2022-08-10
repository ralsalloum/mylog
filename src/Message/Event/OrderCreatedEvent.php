<?php

namespace App\Message\Event;

class OrderCreatedEvent
{
    /**
     * Here we use the id of the entity object, instead of the whole object,
     * and later, in the messenger handler, we will retrieve the object. All this
     * just for avoiding doctrine issue
     */
    private $orderId;

    private $createdByUserId;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getCreatedByUserId()
    {
        return $this->createdByUserId;
    }

    public function setCreatedByUserId($createdByUserId): void
    {
        $this->createdByUserId = $createdByUserId;
    }
}
