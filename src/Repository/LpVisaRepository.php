<?php

namespace App\Repository;

use App\Entity\LpVisa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpVisa|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpVisa|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpVisa[]    findAll()
 * @method LpVisa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpVisaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpVisa::class);
    }

    // /**
    //  * @return LpVisa[] Returns an array of LpVisa objects
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
    public function findOneBySomeField($value): ?LpVisa
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
