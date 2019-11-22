<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

     public function insertOne($user) {
         $newUser = new User();
         $newUser->setTitle($user["title"]);
         $newUser->setFirstName($user["first_name"]);
         $newUser->setMiddleNames($user["middle_names"]);
         $newUser->setLastName($user["last_name"]);
         $newUser->setEmail($user["email"]);
         $newUser->setPhoneMobile($user["phone_mobile"]);
         $newUser->setPhoneLandline($user["phone_landline"]);

         $em = $this->getEntityManager();
         $em->persist($newUser);
         $em->flush();
    }

    public function listAll() {
        $usersJson = [];
        $users = $this->findAll();
        foreach ($users as $user) {
            $usersJson[] = [
                "id" => $user->getId(),
                "title" => $user->getTitle(),
                "first_name" => $user->getFirstName(),
                "middle_names" => $user->getMiddleNames(),
                "last_name" => $user->getLastName(),
                "email" => $user->getEmail(),
                "phone_mobile" => $user->getPhoneMobile(),
                "phone_landline" => $user->getPhoneLandline()
            ];
        }

        return $usersJson;
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
