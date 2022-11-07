<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Service\VoitureService;
use App\Repository\MarquesRepository;
use App\Repository\VoituresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/voitures')]
class VoituresController extends AbstractController
{
    #[Route('/', name: 'voitures_index', methods: ['GET'])]
    public function index(VoituresRepository $voituresRepository, MarquesRepository $marques, VoitureService $voitureService): Response
    {
        return $this->render('voitures.html.twig', [
            'marques' => $marques->findAll(),
            'voitures' => $voitureService->getPaginated(),
        ]);
    }

    #[Route('/new', name: 'voitures_edit', methods: ['GET', 'POST'])]
    public function new(Request $request, VoituresRepository $voituresRepository): Response
    {
        $voiture = new Voitures();
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voituresRepository->save($voiture, true);

            return $this->redirectToRoute('app_voitures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voitures/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'voiture_show', methods: ['GET'])]
    public function voitureShow(Voitures $voitures): Response
    {
        return $this->render('voitureShow.html.twig', [
            'voiture' => $voitures
        ]);
        
    }

    #[Route('/{id}/edit', name: 'app_voitures_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voituresRepository->save($voiture, true);

            return $this->redirectToRoute('app_voitures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voitures/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_voitures_delete', methods: ['POST'])]
    public function delete(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $voituresRepository->remove($voiture, true);
        }

        return $this->redirectToRoute('app_voitures_index', [], Response::HTTP_SEE_OTHER);
    }

    
}
