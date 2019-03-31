<?php

namespace App\Repository;

use App\Entity\LpState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpState|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpState|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpState[]    findAll()
 * @method LpState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpStateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpState::class);
    }

    // /**
    //  * @return LpState[] Returns an array of LpState objects
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
    public function findOneBySomeField($value): ?LpState
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
