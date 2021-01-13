<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
	 */
    public function index(): Response
    {
		    $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        $stages = $repositoryStage->findall();

        return $this->render('prostages/index.html.twig', ['stages' => $stages]);
    }

	/**
	 * @Route("/entreprises", name="entreprises")
	 */
	public function entreprises(): Response
	{
    $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

    $entreprises = $repositoryEntreprise->findall();

		return $this->render('prostages/entreprises.html.twig', ['entreprises' => $entreprises]);
	}

	/**
	 * @Route("/formations", name="formations")
	 */
	public function formations(): Response
	{
    $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

    $formations = $repositoryFormation->findall();

		return $this->render('prostages/formations.html.twig', ['formations' => $formations]);
	}

	/**
	 * @Route("/stages/{id}", name="stages")
	 */
	public function stages(Stage $stage): Response
	{
		return $this->render('prostages/stages.html.twig', ['stage' => $stage]);
	}
}
