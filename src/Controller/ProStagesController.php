<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStagesController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/", name="accueil-page")
=======
     * @Route("/", name="accueil_ProStages")
>>>>>>> route-accueil
     */
    public function index(): Response
    {
        return $this->render('pro_stages/index.html.twig', [
<<<<<<< HEAD
            'controller_name' => 'Bienvenue sur la page d"accueil de ProStages',
=======
            'controller_name' => 'Bienvenue sur la page d''accueil de ProStages',
>>>>>>> route-accueil
        ]);
    }
}

