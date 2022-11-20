<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Service\VoitureService;
use App\Repository\MarquesRepository;
use App\Repository\VoituresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(VoituresRepository $voitures): Response
    {
        return $this->render('home.html.twig', [
            'voitures' => $voitures->findBy([], $orderBy = null, $limit = 4),
        ]);
    }
    
}
