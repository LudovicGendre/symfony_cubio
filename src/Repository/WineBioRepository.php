<?php

namespace App\Repository;

use App\Entity\WineBio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WineBio|null find($id, $lockMode = null, $lockVersion = null)
 * @method WineBio|null findOneBy(array $criteria, array $orderBy = null)
 * @method WineBio[]    findAll()
 * @method WineBio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WineBioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WineBio::class);
    }

    // /**
    //  * @return WineBio[] Returns an array of WineBio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WineBio
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
