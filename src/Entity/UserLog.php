<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Entity;

use Darsyn\IP\Doctrine\MultiType as IPadd;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserLogRepository")
 */
class UserLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="features")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?User
    {
        return $this->product;
    }

    public function setProduct(?User $product): self
    {
        $this->product = $product;

        return $this;
    }




}
