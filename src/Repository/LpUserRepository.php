<?php

namespace App\Repository;

use App\Entity\LpUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpUser[]    findAll()
 * @method LpUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpUser::class);
    }

    // /**
    //  * @return LpUser[] Returns an array of LpUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LpUser
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
