<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserLoginLogRepository")
 */
class UserLoginLog
{

    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid_binary_ordered_time", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator")
     */
    private $id;


    /**
     * @var UuidInterface
     * @ORM\Column(type="uuid_binary_ordered_time")
     *
     */

    private $euuid;
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create",field={"euuid"} )
     */
    private $loginDate;

    /**
     * Todo migrate to from string to IP type
     * @ORM\Column(type="string")
     */
    private $userIp;


    public function getId()
    {
        return $this->id;
    }

    public function getEuuid()
    {
        return $this->euuid;
    }

    public function setEuuid($euuid): self
    {
        $this->euuid = $euuid;

        return $this;
    }

    public function getLoginDate(): ?DateTimeInterface
    {
        return $this->loginDate;
    }

    public function setLoginDate(DateTimeInterface $loginDate): self
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    public function getUserIp(): ?string
    {
        return $this->userIp;
    }

    public function setUserIp(string $userIp): self
    {
        $this->userIp = $userIp;

        return $this;
    }
}
