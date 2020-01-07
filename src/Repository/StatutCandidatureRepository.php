<?php

namespace App\Repository;

use App\Entity\StatutCandidature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StatutCandidature|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutCandidature|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutCandidature[]    findAll()
 * @method StatutCandidature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutCandidatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutCandidature::class);
    }

    // /**
    //  * @return StatutCandidature[] Returns an array of StatutCandidature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatutCandidature
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
