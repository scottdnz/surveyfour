<?php

namespace App\Repository;

use App\Entity\AnswerSubmitted;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AnswerSubmitted|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnswerSubmitted|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnswerSubmitted[]    findAll()
 * @method AnswerSubmitted[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerSubmittedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AnswerSubmitted::class);
    }

    // /**
    //  * @return AnswerSubmitted[] Returns an array of AnswerSubmitted objects
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
    public function findOneBySomeField($value): ?AnswerSubmitted
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
