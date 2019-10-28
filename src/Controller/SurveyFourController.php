<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\JsonResponse;
// use Doctrine\ORM\EntityManagerInterface;
// use Doctrine\DBAL\Driver\Connection;

class SurveyFourController extends AbstractController
{
    /**
     * Returns HTML template
     * @Route("/", name="surveyFourDefault")
     */
    public function default()
    {
        return $this->render("indexSurveyFour.html.twig", 
            []
        );
    }

}
