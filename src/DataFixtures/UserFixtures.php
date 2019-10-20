<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends BaseFixtures
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     * @return mixed|void
     */
    public function loadData(ObjectManager $manager)
    {

        // fake User
        $this->createMany(
            User::class,
            100,
            function (User $user, $count) {
                $user->setUsername($this->faker->unique(false)->userName);
                $user->setFullname($this->faker->name);
                $user->setEmail($this->faker->email);
                $plainPassword = $this->faker->password;
                $user->setPassword(
                    $this->passwordEncoder
                        ->encodePassword($user, $plainPassword)
                );

                $value = (bool)random_int(0, 1);
                if ($value == 1) {
                    $role = 'ROLE_ADMIN';
                } else {
                    $role = 'ROLE_USER';
                }
                $user->setRoles(array([$role]));
                $user->setEnabled($value);
            }
        );

        $manager->flush();
    }
}
