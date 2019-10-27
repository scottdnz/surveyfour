<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
// use App\Entity\User;
// use App\Repository\UserRepository;
// use Doctrine\DBAL\Driver\Connection;

class SurveysController extends AbstractController
{
	/**
     * Returns HTML template
     * @Route("/survey", name="surveysDefault")
     */
    public function default()
    {
        return $this->render("surveys/index.html.twig", 
            []
        );
    }

}