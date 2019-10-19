<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 * See https://rihards.com/2018/symfony-login-event-listener/
 */

namespace App\EventListener;

use App\Entity\User;
use App\Entity\UserLog;
use App\Utils\Helpers\DoctrineIpTypeHelper;
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
        $userLog = new UserLog();
        $user = new User;

        // Get the User entity.
        $userData = $event->getAuthenticationToken()->getUsername();
        $ipstring = $event ->getRequest()->getClientIp();
        dd($userData);
        // Update your field here.
        $userLog->setLoginTime(new \DateTime());
        $userLog ->setIpAddress($ipstring);
        $userLog->setUuid($user->getUuid());

        // Persist the data to database.
        $this->em->persist($userLog);
        $this->em->flush();
    }
}
