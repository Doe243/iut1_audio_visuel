<?php

namespace App\Repository;

use App\Entity\LpRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LpRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method LpRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method LpRole[]    findAll()
 * @method LpRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LpRoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LpRole::class);
    }

    // /**
    //  * @return LpRole[] Returns an array of LpRole objects
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
    public function findOneBySomeField($value): ?LpRole
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
