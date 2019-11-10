<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Dotenv\Dotenv;

class SurveysController extends AbstractController
{
	/**
     * Returns HTML template
     * @Route("/survey", name="surveysDefault")
     * @Route("/survey4/survey", name="surveysDefaultSubfolder")
     */
    public function default()
    {
       $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__.'/../../.env');
        $subfolderAlias = $_ENV["APP_ENV_READABLE"] === "dev" ? "" : $_ENV["SUBFOLDER_ALIAS"];

        return $this->render("surveys/index.html.twig", 
             [
                "subfolderAlias" => $subfolderAlias
            ]
        );
    }

}