<?php

namespace App\Controller;

use App\Entity\Voitures;
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

    #[Route('/voitures', name: 'voiture')]
    public function voitures(VoituresRepository $voitures): Response
    {
        return $this->render('voitures.html.twig', [
            'voitures' => $voitures->findAll(),
        ]);
    }

    #[Route('/voiture/{slug}', name: 'voiture_show')]
    public function voitureShow(Voitures $voitures): Response
    {
        return $this->render('voitureShow.html.twig', [
            'voiture' => $voitures
        ]);
    }
}
