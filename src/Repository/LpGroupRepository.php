<?php

namespace App\Repository;

use App\Entity\LpGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpGroup[]    findAll()
 * @method LpGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpGroup::class);
    }

    // /**
    //  * @return LpGroup[] Returns an array of LpGroup objects
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
    public function findOneBySomeField($value): ?LpGroup
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
