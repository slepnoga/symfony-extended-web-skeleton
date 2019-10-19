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
     * @ORM\Column(type="string", length=180)
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="loginTime")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $userName;



}
