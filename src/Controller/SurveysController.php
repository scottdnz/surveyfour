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
use Symfony\Component\Yaml\Yaml;

class SurveysController extends AbstractController
{
	/**
     * Returns HTML template
     * @Route("/survey", name="surveysDefault")
     */
    public function default()
    {
        // Hacky config for now. Replace me
        $customConfig = Yaml::parseFile(__DIR__.'/../../config/custom.yaml', Yaml::PARSE_OBJECT_FOR_MAP);
        $subfolderAlias = $customConfig->urls->using_subfolder ? $customConfig->urls->subfolder_alias : "";
        return $this->render("surveys/index.html.twig", 
             ["subfolderAlias" => $subfolderAlias]
        );
    }

}