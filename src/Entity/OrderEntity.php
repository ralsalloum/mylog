<?php

namespace App\Entity;

use App\Repository\OrderEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: OrderEntityRepository::class)]
class OrderEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $orderSubject;

    #[ORM\Column(type: 'text', nullable: true)]
    private $orderDetails;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'integer')]
    private $createdByUserId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderSubject(): ?string
    {
        return $this->orderSubject;
    }

    public function setOrderSubject(?string $orderSubject): self
    {
        $this->orderSubject = $orderSubject;

        return $this;
    }

    public function getOrderDetails(): ?string
    {
        return $this->orderDetails;
    }

    public function setOrderDetails(?string $orderDetails): self
    {
        $this->orderDetails = $orderDetails;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedByUserId(): ?int
    {
        return $this->createdByUserId;
    }

    public function setCreatedByUserId(int $createdByUserId): self
    {
        $this->createdByUserId = $createdByUserId;

        return $this;
    }
}
