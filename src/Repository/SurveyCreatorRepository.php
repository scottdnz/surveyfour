<?php

namespace App\Repository;

use App\Entity\SurveyCreator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SurveyCreator|null find($id, $lockMode = null, $lockVersion = null)
 * @method SurveyCreator|null findOneBy(array $criteria, array $orderBy = null)
 * @method SurveyCreator[]    findAll()
 * @method SurveyCreator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurveyCreatorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SurveyCreator::class);
    }

    // /**
    //  * @return SurveyCreator[] Returns an array of SurveyCreator objects
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
    public function findOneBySomeField($value): ?SurveyCreator
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
