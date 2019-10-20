<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 * See https://rihards.com/2018/symfony-login-event-listener/
 */

namespace App\EventListener;

use App\Entity\UserLoginLog;
use App\Utils\Helpers\LoggingUserhelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    use LoggingUserhelper;

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $userLoginLog = new UserLoginLog();
        // Get the User entity.
        $user = $event->getAuthenticationToken()->getUser();
        $userLoginLog->setEuuid($user->getId());

        // Persist the data to database.
        $this->em->persist($userLoginLog);
        $this->em->flush();
    }
}
