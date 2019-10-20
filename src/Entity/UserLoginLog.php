<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Ramsey\Uuid\UuidInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserLoginLogRepository")
 */
class UserLoginLog
{

    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid_binary_ordered_time", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator")
     */
    private $id;


    /**
     * @var \Ramsey\Uuid\UuidInterface
     * @ORM\Column(type="uuid_binary_ordered_time")
     *
     */

   private $euuid;
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create",field={"euuid"} )
     */
   private $loginDate;


}
