<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Darsyn\IP\Doctrine\MultiType as IPadd;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var string The user uuid
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */

    private $uuid;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", options={"default"="1800-01-01 00-00-00"})
     */
    private  $loginTime;

    /**
     * @var
     * @ORM\Column(type="ip")
     *
     */
    private $ip;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return \DateTime
     */
    public function getLoginTime(): \DateTime
    {
        return $this->loginTime;
    }

    /**
     * @param \DateTime $loginTime
     */
    public function setLoginTime(\DateTime $loginTime): void
    {
        $this->loginTime = $loginTime;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }


    /**
     * @param IPadd $ip
     */
    public function setIp(IPadd $ip): void
    {
        $this->ip = $ip;
    }


}
