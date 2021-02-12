<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/entreprises/{nom}", name="prostages_stagesParEntreprise")
     * @ParamConverter("nom", options={"nom" = "nom"})
     */
    public function stageParEntreprise($nom)
    {
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

      $stages = $repositoryStage->findByEntreprise($nom);

      return $this->render('prostages/stageParEntreprise.html.twig', ['nom' => $nom, 'stages' => $stages]);
    }

    /**
     * @Route("/entreprises/{nom}/stages", name="prostages_entreprises_stage")
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
   * @Route("/formations/{intitule}", name="prostages_stagesParFormation")

   */
  public function stageParFormation($intitule)
    {
      $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

      $stages = $repositoryStage->findByFormation($intitule);

      return $this->render('prostages/stageParFormation.html.twig', ['nomFormation' => $intitule, 'stages' => $stages]);
    }

  /**
     * @Route("/formations/{id}/stages", name="prostages_formations_stage")
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

  /**
   * @Route("/creer-entreprise", name="prostages_nouvelle_entreprise")
   */
  public function new(Request $request)
  {
    $entreprise = new Entreprise();

    $form = $this -> createFormBuilder($entreprise)
                  -> add('nom')
                  -> add('activite')
                  -> add('adresse')
                  -> add('site')
                  ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($entreprise);
      $entityManager->flush();

      return $this->redirectToRoute('prostages_accueil');
    }

    return $this->render('prostages/creationEntreprise.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/modifier-entreprise/{nom}", name="prostages_modif_entreprise")
   */
  public function edit(Request $request, Entreprise $entreprise)
  {
    $form = $this -> createFormBuilder($entreprise)
                  -> add('nom')
                  -> add('activite')
                  -> add('adresse')
                  -> add('site')
                  ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($entreprise);
      $entityManager->flush();

      return $this->redirectToRoute('prostages_accueil');
    }

    return $this->render('prostages/modifEntreprise.html.twig', [
      'form' => $form->createView(),
    ]);
  }

}
