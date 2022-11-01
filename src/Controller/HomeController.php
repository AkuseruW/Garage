<?php

namespace App\Controller;

use App\Repository\VoituresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(VoituresRepository $voitures): Response
    {
        return $this->render('home.html.twig', [
            'voitures' => $voitures->findBy([],$orderBy = null ,$limit=4),
        ]);
    }
}
