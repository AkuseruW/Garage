<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('Axel')
            ->setEmail('axel@admin.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$JqfLlBHfLs0y4ba3apZmpesfJ1Y4OhfNxSka8vV0y0MueApVZyRsK');

        $manager->persist($user);
        $manager->flush();
    }
}
