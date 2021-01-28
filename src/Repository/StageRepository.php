<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stage[]    findAll()
 * @method Stage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }

     /**
      * @return Stage[] Returns an array of Stage objects
      */

    public function findByEntreprise($nom)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.entreprise = :val')
            ->setParameter('val', $nom)
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * @return Stage[] Returns an array of Stage objects
     */

   public function findByFormation($formation)
   {
       //Recuperation du gestionnaire d'entite
       $entityManager = $this->getEntityManager();

       //Construction de la requete
       $requete = $entityManager-createQuery(
         'SELECT s, e
         FROM App\Entity\Stage s
         JOIN s.formations f
         JOIN s.entreprise e
         WHERE f = :formation'
        );

        //Attribution de la valeur des paramètres injectés dans la requête
        $requete->setParameter('formation', $formation);

        //Execution de la requête
        return $requete->execute();
   }
}
