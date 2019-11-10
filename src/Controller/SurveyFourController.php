<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\JsonResponse;
// use Doctrine\ORM\EntityManagerInterface;
// use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Dotenv\Dotenv;

class SurveyFourController extends AbstractController
{
    /**
     * Returns HTML template
     * @Route("/", name="surveyFourDefault")
     * @Route("/survey4/", name="surveyFourDefaultSubfolder")
     */
    public function default()
    {
        // Hacky config for now. Replace me
        // $customConfig = Yaml::parseFile(__DIR__.'/../../config/custom.yaml', Yaml::PARSE_OBJECT_FOR_MAP);
        // $subfolderAlias = $customConfig->urls->using_subfolder ? $customConfig->urls->subfolder_alias : "";

        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__.'/../../.env');
        $subfolderAlias = $_ENV["APP_ENV_READABLE"] === "dev" ? "" : $_ENV["SUBFOLDER_ALIAS"];

        return $this->render("indexSurveyFour.html.twig", 
            [
                "subfolderAlias" => $subfolderAlias
            ]
        );
    }

}
