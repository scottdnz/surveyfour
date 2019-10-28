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
use Symfony\Component\Yaml\Yaml;

class UserAdminController extends AbstractController
{

	/**
     * API call
     * @Route("/user/insert", name="userInsert", methods={"POST", "GET"})
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
     * @Route("/user/list", name="userList", methods={"GET"})
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
        // Hacky config for now. Replace me
        $customConfig = Yaml::parseFile(__DIR__.'/../../config/custom.yaml', Yaml::PARSE_OBJECT_FOR_MAP);
        $subfolderAlias = $customConfig->urls->using_subfolder ? $customConfig->urls->subfolder_alias : "";
        return $this->render("userAdmin/index.html.twig", 
             ["subfolderAlias" => $subfolderAlias]
        );
    }

     /**
     * Returns HTML template
     * @Route("/surveyfour/user", name="userAdminDefaultSubfolder")
     */
    public function defaultSubfolder()
    {
        // Hacky config for now. Replace me
        $customConfig = Yaml::parseFile(__DIR__.'/../../config/custom.yaml', Yaml::PARSE_OBJECT_FOR_MAP);
        $subfolderAlias = $customConfig->urls->using_subfolder ? $customConfig->urls->subfolder_alias : "";
        return $this->render("userAdmin/index.html.twig", 
             ["subfolderAlias" => $subfolderAlias]
        );
    }    


}
