<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Marques;
use App\Entity\Voitures;
use App\Entity\ImagesVoitures;
use App\DataFixtures\MarquesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Symfony\Component\HttpFoundation\File\File;


class VoituresFixtures extends Fixture
{

    private $uploaderHelper;
    public function __construct(UploaderHelper $uploaderHelper)
    {
        $this->uploaderHelper = $uploaderHelper;
    }

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
                ->setCarburant($faker->vehicleFuelType)
                ->setCylindre($faker->randomElement([2, 4, 8]))
                ->setDescription($faker->text())
                ->setPuissance($faker->numberBetween(0, 100))
                ->setNbrPropi($faker->numberBetween(0, 9))
                ->setMarques($this->getReference(MarquesFixtures::VOITURE_MARQUE_REFERENCE))
                ->setDate($faker->dateTime())
                ->setSlug($faker->slug())
            ;
            $manager->persist($voitures);
        }
        $manager->flush();
        



        $randomImage = $this->faker->randomElement(self::$articleImages);
        $image = new ImagesVoitures();
        $image->setImageName($faker->word())
            ->setImageFile(new File(__DIR__.'/images/'.$randomImage))
        ;
        $voitures = new Voitures();
        $voitures->setModelName('Porsche 356C')
            ->setPrix($faker->numberBetween( 1500, 6000 ))
            ->setKilometrage($faker->numberBetween( 400, 100000 ))
            ->setCarburant($faker->vehicleFuelType)
            ->setCylindre($faker->randomElement([2, 4, 8]))
            ->setDescription($faker->text())
            ->setPuissance($faker->numberBetween(0, 100))
            ->setNbrPropi($faker->numberBetween(0, 9))
            // ->setMarques($this->getReference(MarquesFixtures::VOITURE_MARQUE_REFERENCE))
            // ->setMarques('Porsche')
            ->setDate($faker->dateTime())
            ->setSlug($faker->slug())
        ;


        $manager->persist($voitures);
        $manager->flush();
    }
}
