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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="username")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $username;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?User
    {
        return $this->username;
    }

    public function setUsername(?User $username): self
    {
        $this->username = $username;

        return $this;
    }


}
