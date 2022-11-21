<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername('Axel')
            ->setEmail('axel@admin.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$JqfLlBHfLs0y4ba3apZmpesfJ1Y4OhfNxSka8vV0y0MueApVZyRsK');

        $manager->persist($admin);
        $manager->flush();

        
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i <= 15; $i++) {
            $user = new User();
            $user->setUsername($faker->name())
                ->setEmail($faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPassword($faker->password(10));

            $manager->persist($user);
        }
        $manager->flush();
        
        $this->addReference(self::USER_REFERENCE, $user);
    }
}
