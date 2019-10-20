<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\DataFixtures;



use App\Entity\UserLoginLog;
use App\Utils\Helpers\LoggingUserhelper;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;


class UserLoginLogFixtures extends BaseFixtures
{
    use LoggingUserhelper;

    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {

        // fake User
        $this->createMany(
            UserLoginLog::class,
            100,
            function (UserLoginLog $userLoggingLog, $count) {
                

                $userLoggingLog->setUserIp($this->faker->ipv4);
                $userLoggingLog->setEuuid($this->generateUUID1());

            }
        );

        $manager->flush();
    }

}
