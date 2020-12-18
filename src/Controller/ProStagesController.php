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
        return $this->render('prostages/index.html.twig');
    }
	
	/**
	 * @Route("/entreprises", name="entreprises")
	 */
	public function entreprises(): Response
	{
		return $this->render('prostages/entreprises.html.twig');
	}
	
	/**
	 * @Route("/formations", name="formations")
	 */
	public function formations(): Response
	{
		return $this->render('prostages/formations.html.twig');
	}
	
	/**
	 * @Route("/stages/{id}", name="stages")
	 */
	public function stages($id): Response
	{
		return $this->render('prostages/stages.html.twig', ['idStage' => $id]);
	}
}

