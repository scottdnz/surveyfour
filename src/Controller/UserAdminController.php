<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Repository\UserRepository;
// use Doctrine\DBAL\Driver\Connection;

class UserAdminController extends AbstractController
{

	/**
     * API call
     * @Route("/user/insert", name="user-insert", methods={"POST", "GET"})
     */
    public function insert(Request $request, UserRepository $userRepo)
    {   
    	$status = "ok";
		$userData = json_decode(
    	    $request->getContent(),
            true
        );



		try {
			$userRepo->insertOne($userData);
		}
		catch (Exception $e) {
			$status = $e->getMessage();
		}

		return new JsonResponse(
        	[
                "status" => $status,
                "userData" => $userData["first_name"]

            ]
            // JsonResponse::HTTP_CREATED
        );
    }


    /**
     * API call
     * @Route("/user/list", name="user_list", methods={"GET"})
     */
    public function list(UserRepository $userRepo) {
    	$status = "ok";
    	$users = [];
    	try {
			$users = $userRepo->listAll(); // listAll();
		}
		catch (Exception $e) {
			$status = $e->getMessage();
		}

		return new JsonResponse(
        	[
                "status" => $status,
                "users" => $users
            ]
            // JsonResponse::HTTP_CREATED
        );

    }

     /**
     * Returns HTML template
     * @Route("/user", name="userAdminDefault")
     */
    public function default()
    {
        return $this->render("userAdmin/index.html.twig", 
            []
        );
    }

}
