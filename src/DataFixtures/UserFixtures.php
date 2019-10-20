<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

/**
 * @property UserPasswordEncoder encoder
 */
class UserFixtures extends BaseFixtures
{
    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {
        // fake User
        $this->createMany(
        /**
         * @param User $user
         * @param      $count
         */
            User::class,
            100,
            function (User $user, $count) {
                $user->setUsername($this->faker->unique(false)->userName);
                $user->setFullname($this->faker->name);
                $user->setEmail($this->faker->email);
                $plainPassword = $this->faker->password;
                $user->setPassword(md5($plainPassword));
                $value = (bool)random_int(0, 1);
                if ($value == 1) {
                    $role = 'ROLE_ADMIN';
                } else {
                    $role = 'ROLE_USER';
                }
                $user->setRoles(array([$role]));
            }
        );

        $manager->flush();
    }
}
