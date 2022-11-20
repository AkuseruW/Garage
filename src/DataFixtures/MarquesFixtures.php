<?php

namespace App\DataFixtures;

use App\Entity\Marques;
use Faker\Provider\Fakecar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class MarquesFixtures extends Fixture
{

    public const VOITURE_MARQUE_REFERENCE = 'marques';

    public function load(ObjectManager $manager): void
    {
        
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new Fakecar($faker));

        for ($i = 1; $i <= 5; $i++) {
            $marques = new Marques();
            $marques->setNom($faker->vehicleBrand)
                ->setImageName('...');

            $manager->persist($marques);
            $manager->flush();
        }

        $this->addReference(self::VOITURE_MARQUE_REFERENCE, $marques);

    }
}
