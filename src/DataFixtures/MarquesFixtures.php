<?php

namespace App\DataFixtures;

use App\Entity\Marques;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class MarquesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marques = new Marques();
        $marques->setNom('Porsche')
            ->setImageName('Porsche-Logo.png');

        $manager->persist($marques);
        $manager->flush();

        $marques = new Marques();
        $marques->setNom('BMW')
            ->setImageName('BMW.svg.webp');

        $manager->persist($marques);
        $manager->flush();
    }
}
