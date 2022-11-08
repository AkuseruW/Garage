<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/profile/{slug}', name: 'user_profile')]
    public function index(User $user): Response
    {
        
        return $this->render('user/profilUser.html.twig', [
            'user' => $user,
        ]);
    }
}
