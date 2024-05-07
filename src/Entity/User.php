<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userName = null;

    #[ORM\Column(nullable: true)]
    private ?int $userAge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productDesc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserAge(): ?int
    {
        return $this->userAge;
    }

    public function setUserAge(?int $userAge): static
    {
        $this->userAge = $userAge;

        return $this;
    }

    public function getProductDesc(): ?string
    {
        return $this->productDesc;
    }

    public function setProductDesc(?string $productDesc): static
    {
        $this->productDesc = $productDesc;

        return $this;
    }
}
