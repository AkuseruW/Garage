<?php

namespace App\DataFixtures;

use App\Entity\ImagesVoitures;
use App\Entity\Marques;
use App\Entity\Voitures;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class VoituresFixtures extends Fixture
{

    public function getDependencies()
    {
        return [
            MarquesFixtures::class,
            ImagesVoitures::class
        ];
    }

    public function load(ObjectManager $manager): void
    {  
        // $faker = Factory::create('fr_FR');
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        for ($i = 1; $i <= 30; $i++) {
            $voitures = new Voitures();
            $voitures->setModelName($faker->vehicle)
                ->setPrix($faker->numberBetween( 1500, 6000 ))
                ->setKilometrage($faker->numberBetween( 400, 100000 ))
                ->setMarques($this->getReference(MarquesFixtures::class))
            ;
            $manager->persist($voitures);
        }
        $manager->flush();

    }
}
