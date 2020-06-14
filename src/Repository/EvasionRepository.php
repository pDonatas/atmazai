<?php

namespace App\Repository;

use App\Entity\Evasion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evasion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evasion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evasion[]    findAll()
 * @method Evasion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvasionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evasion::class);
    }

    // /**
    //  * @return Evasion[] Returns an array of Evasion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evasion
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
