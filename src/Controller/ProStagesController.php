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
     * @Route("/", name="prostages_accueil")
	 */
    public function index(): Response
    {
		    $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        $stages = $repositoryStage->findall();

        return $this->render('prostages/index.html.twig', ['stages' => $stages]);
    }

	   /**
	    * @Route("/entreprises", name="prostages_entreprises")
	    */
  	public function entreprises(): Response
	  {
      $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

      $entreprises = $repositoryEntreprise->findall();

		  return $this->render('prostages/entreprises.html.twig', ['entreprises' => $entreprises]);
	  }

  /**
     * @Route("/entreprise/{id}/stages", name="prostages_entreprises_stage")
     */
    public function getByEntreprise(Entreprise $stages) // La vue affichera la liste des stages proposés par une entreprise
    {
        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', [ 'stages' => $stages->getStages() ]);
    }

	/**
	 * @Route("/formations", name="prostages_formations")
	 */
	public function formations(): Response
	{
    $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

    $formations = $repositoryFormation->findall();

		return $this->render('prostages/formations.html.twig', ['formations' => $formations]);
	}

  /**
     * @Route("/formation/{id}/stages", name="prostages_formations_stage")
     */
    public function getByFormation(Formation $stages) // La vue affichera la liste des stages proposés pour une formation
    {
        // Envoyer les ressources récupérées à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', [ 'stages' => $stages->getStages() ]);
    }

	/**
	 * @Route("/stages/{id}", name="prostages_stages")
	 */
	public function stages(Stage $stage): Response
	{
		return $this->render('prostages/stages.html.twig', ['stage' => $stage]);
	}
}
