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
		
        $safran = new Entreprise();
		$safran->setNom("Safran");
		$safran->setActivite($faker->realText($maxNbChars = 100, $indexSize = 2));
		$safran->setAdresse("Avenue du 1er mai, 40220 Tarnos");
		$safran->setSite("www.safran-helicopter-engines.com");
        $manager->persist($safran);

        $manager->flush();
    }
}
?>