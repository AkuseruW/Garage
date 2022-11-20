<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Marques;
use App\Entity\Voitures;
use App\Entity\ImagesVoitures;
use App\DataFixtures\MarquesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use App\Service\UploaderHelper;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class VoituresFixtures extends Fixture implements DependentFixtureInterface
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
        // $faker = (new \Faker\Factory())::create();
        // $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        // for ($i = 1; $i <= 3; $i++) {
        //     $voitures = new Voitures();
        //     $voitures->setModelName($faker->vehicle)
        //         ->setPrix($faker->numberBetween( 1500, 6000 ))
        //         ->setKilometrage($faker->numberBetween( 400, 100000 ))
        //         ->setCarburant($faker->vehicleFuelType)
        //         ->setCylindre($faker->randomElement([2, 4, 8]))
        //         ->setDescription($faker->text())
        //         ->setPuissance($faker->numberBetween(0, 100))
        //         ->setNbrPropi($faker->numberBetween(0, 9))
        //         ->setMarques($this->getReference(MarquesFixtures::VOITURE_MARQUE_REFERENCE))
        //         ->setDate($faker->dateTime())
        //         ->setSlug($faker->slug())
        //     ;
        //     $manager->persist($voitures);
        // }
        // $manager->flush();
        




        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $voitures = new Voitures();
        $voitures->setModelName('Porsche 356C')
            ->setPrix($faker->numberBetween( 1500, 6000 ))
            ->setKilometrage($faker->numberBetween( 400, 100000 ))
            ->setCarburant($faker->vehicleFuelType)
            ->setCylindre($faker->randomElement([2, 4, 8]))
            ->setDescription($faker->text())
            ->setPuissance($faker->numberBetween(0, 100))
            ->setNbrPropi($faker->numberBetween(0, 9))
            ->setMarques($this->getReference(MarquesFixtures::VOITURE_MARQUE_REFERENCE))
            ->setDate($faker->dateTime())
            ->setTransmission('Manuel')
            ->setSlug($faker->slug()) ;

        $images = array('1995-porsche-911-gt2-001-1080-6361950594d0e897133428.jpg',
        '1995-porsche-911-gt2-002-1080-636310c718e9b954095700.jpg','1995-porsche-911-gt2-003-1080-636303ef120ef972371492.jpg'
        );

        foreach($images as $i)
        {
            

            $image = new ImagesVoitures();
            $targetPath = sys_get_temp_dir().'/'.$i;
            $image->setImageName($i);
            $image->setImageFile(new File(__DIR__.'/images/'.$i, $targetPath, true));

            $fs = new Filesystem();
            $targetPath = sys_get_temp_dir().'/'.$i;
            $fs->copy(__DIR__.'/images/'.$i, $targetPath, true);

            $imageFilename = $this->uploaderHelper
                ->uploadArticleImage(new File($targetPath));
            


            $voitures->addImagesVoiture($image);
    
            $manager->persist($image);
            // $manager->flush();
        }

        $manager->persist($voitures);
        $manager->flush();

    }
}
