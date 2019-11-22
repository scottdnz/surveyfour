<?php

namespace App\Repository;

use App\Entity\Survey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Survey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Survey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Survey[]    findAll()
 * @method Survey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurveyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Survey::class);
    }

    public function insertSurveyInitial($user) {
         $newSurvey = new Survey();
         $newSurvey->setName($survey["name"]);
         $newSurvey->setCreated($survey["created"]);
         $newSurvey->setIssuedActive($survey["issued_active"]);
         $newSurvey->setMinutesAllowed($survey["minutes_allowed"]);
         $newSurvey->setName($survey["date_open"]);
         $newSurvey->setName($survey["date_close"]);
         $newSurvey->setName($survey["survey_creator"]);

         $em = $this->getEntityManager();
         $em->persist($newSurvey);
         $em->flush();
    }


    // /**
    //  * @return Survey[] Returns an array of Survey objects
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
    public function findOneBySomeField($value): ?Survey
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
