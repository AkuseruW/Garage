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



class VoituresFixtures extends Fixture
{

    // private $uploaderHelper;
    // public function __construct(UploaderHelper $uploaderHelper)
    // {
    //     $this->uploaderHelper = $uploaderHelper;
    // }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            MarquesFixtures::class,
            ImagesVoitures::class
        ];
    }

    public function load(ObjectManager $manager): void
    {    

        $faker = Factory::create('fr_FR');
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        
        for ($i=0; $i < 4; $i++) 
        { 
            $voitures = new Voitures();
                $voitures
                    ->setPrix($faker->numberBetween( 1500, 6000 ))
                    ->setKilometrage($faker->numberBetween( 400, 100000 ))
                    ->setCarburant($faker->vehicleFuelType)
                    ->setCylindre($faker->randomElement([2, 4, 8]))
                    ->setDescription($faker->paragraphs(10, true))
                    ->setPuissance($faker->numberBetween(0, 100))
                    ->setNbrPropi($faker->numberBetween(0, 9))
                    ->setMarques($this->getReference(MarquesFixtures::VOITURE_MARQUE_REFERENCE))
                    ->setDate($faker->dateTime())
                    ->setTransmission('Manuel')
                    ->setUser($this->getReference(UserFixtures::USER_REFERENCE))  
                    ->setSlug($faker->slug()) ;

                // ! Tableau Image 
                if ($i == 0) {
                    $voitures->setModelName('Porsche');
                    $images = array('1995-porsche-911-gt2-001-1080-6361950594d0e897133428.jpg',
                    '1995-porsche-911-gt2-002-1080-636310c718e9b954095700.jpg','1995-porsche-911-gt2-003-1080-636303ef120ef972371492.jpg'
                    );
                }elseif ($i == 1) {
                    $voitures->setModelName('BMW');
                    $images = array('1974-BMW-2002-Turbo-001-1080.jpg','1974-BMW-2002-Turbo-002-1080.jpg',
                    '1974-BMW-2002-Turbo-003-1080.jpg','1974-BMW-2002-Turbo-006-1080.jpg'
                    );
                }elseif ($i == 2) {
                    $voitures->setModelName('Ford');
                    $images = array('1966-Shelby-GT350H-001-1080.jpg',
                    '1966-Shelby-GT350H-002-1080.jpg','1966-Shelby-GT350H-003-1080.jpg','1966-Shelby-GT350H-004-1080.jpg'
                    );
                }else {
                    $voitures->setModelName('Alfa Romeo');
                    $images = array('1969-Alfa-Romeo-Junior-Z-001-1080.jpg','1969-Alfa-Romeo-Junior-Z-002-1080.jpg',
                    '1969-Alfa-Romeo-Junior-Z-004-1080.jpg','1969-Alfa-Romeo-Junior-Z-006-1080.jpg'
                    );
                }
            
            // ! Ajout image dans la bdd 
            foreach($images as $img)
            {
                $imageV = new ImagesVoitures();
                // $targetPath = sys_get_temp_dir().'/'.$i;
                $imageV->setImageName($img);
                $imageV->setImageFile(new File(__DIR__.'/images/'.$img));

                // $fs = new Filesystem();
                // $targetPath = sys_get_temp_dir().'/'.$i;
                // $fs->copy(__DIR__.'/images/'.$i, $targetPath, true);

                // $imageFilename = $this->uploaderHelper

                //     ->uploadArticleImage(new File($targetPath));

                $voitures->addImagesVoiture($imageV);   
                $manager->persist($imageV);

                $manager->persist($voitures);
            }
        }     
        $manager->flush();

    }
}
