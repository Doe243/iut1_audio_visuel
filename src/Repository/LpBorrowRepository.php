<?php

namespace App\Repository;

use App\Entity\LpBorrow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpBorrow|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpBorrow|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpBorrow[]    findAll()
 * @method LpBorrow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpBorrowRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpBorrow::class);
    }

    // /**
    //  * @return LpBorrow[] Returns an array of LpBorrow objects
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
    public function findOneBySomeField($value): ?LpBorrow
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
