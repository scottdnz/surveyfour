<?php

namespace App\Repository;

use App\Entity\AdviceBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdviceBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdviceBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdviceBlock[]    findAll()
 * @method AdviceBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdviceBlockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdviceBlock::class);
    }

    // /**
    //  * @return AdviceBlock[] Returns an array of AdviceBlock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdviceBlock
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
