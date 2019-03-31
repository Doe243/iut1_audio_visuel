<?php

namespace App\Repository;

use App\Entity\LpProductCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpProductCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpProductCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpProductCat[]    findAll()
 * @method LpProductCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpProductCatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpProductCat::class);
    }

    // /**
    //  * @return LpProductCat[] Returns an array of LpProductCat objects
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
    public function findOneBySomeField($value): ?LpProductCat
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
