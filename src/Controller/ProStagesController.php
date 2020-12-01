<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
	 */
    public function index(): Response
    {
        return $this->render('pro_stages/index.html.twig');
    }
	
	/**
	 * @Route("/entreprises", name="entreprises")
	 */
	public fonction entreprises(): Response
	{
		return $this->render('pro_stages/index.html.twig');
	}
}

