<?php

namespace App\Repository;

use App\Entity\UserLoginLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserLoginLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserLoginLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserLoginLog[]    findAll()
 * @method UserLoginLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserLoginLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserLoginLog::class);
    }

    // /**
    //  * @return UserLoginLog[] Returns an array of UserLoginLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserLoginLog
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
