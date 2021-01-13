<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		$faker = \Faker\Factory::create('fr_FR');

		//Creer les diférents types de Formations
        $nomFormations = array("DUT informatique","DUT GEA","DUT GIM","BTS SN","BTS SIO");
        $listeDesFormations = array();
        foreach ($nomFormations as $nomFormation  ) {
          $formation = new Formation();
          $formation->setIntitule($nomFormation);
		      $formation->setVille($faker->city);
		      $formation->setNiveau($faker->regexify('BAC+ [1-5]'));	  
          $manager->persist($formation);
          $listeDesFormations[]=$formation;
        }

		//Creer les différentes entreprises
        for($i = 0;$i<10;$i++){
          $entreprise = new Entreprise();
          $entreprise->setNom($faker->company);
		  $entreprise->setActivite("Informatique");
          $entreprise->setAdresse($faker->streetAddress);
		  $entreprise->setSite($faker->url);


		  //creer les stages que propose cette entreprise
          $nombresStages = $faker->numberBetween($min = 0, $max = 10);
          for($i = 0;$i<$nombresStages;$i++){
            $stage = new Stage();
            $stage->setTitre($faker->jobTitle);
            $stage->setDescriptif($faker->paragraph($nbSentences = 3, $variableNbSentences = true));
            $stage->setDateDebut($faker->dateTimeBetween($startDate = 'now', $endDate = '+1years', $timezone = null));
            $stage->setDuree($faker->numberBetween($min =15, $max =180));
            $stage->setCompetencesRequises($faker->paragraph($nbSentences = 1, $variableNbSentences = true));
            $stage->setExperienceRequise($faker->sentence($nbWords = 6, $variableNbWords = true));


            //lier l'entreprise au stage
            $entreprise->addStage($stage);

            //lier une formation au stage
            $idFormation = $faker->numberBetween($min =0, $max = 4);
            $listeDesFormations[$idFormation]->addStage($stage);

            $manager->persist($stage);
          }

        $manager->persist($entreprise);
        }

        foreach ($listeDesFormations as $formation) {
            $manager->persist($formation);
        }

        $manager->flush();
    }
}
?>
