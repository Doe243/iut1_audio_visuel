<?php

namespace App\Repository;

use App\Entity\LpProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpProduct[]    findAll()
 * @method LpProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpProduct::class);
    }

    // /**
    //  * @return LpProduct[] Returns an array of LpProduct objects
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
    public function findOneBySomeField($value): ?LpProduct
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
